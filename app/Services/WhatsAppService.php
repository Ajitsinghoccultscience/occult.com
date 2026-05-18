<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    private string $baseUrl;
    private string $accessToken;
    private string $defaultCountryCode;

    public function __construct()
    {
        $version           = config('whatsapp.api_version', 'v18.0');
        $phoneNumberId     = config('whatsapp.phone_number_id');
        $this->baseUrl     = config('whatsapp.api_base') . "/{$version}/{$phoneNumberId}";
        $this->accessToken = config('whatsapp.access_token');
        $this->defaultCountryCode = config('whatsapp.default_country_code', '91');
    }

    /**
     * Submit a new template to Meta for approval.
     * Converts named {{var}} placeholders to numbered {{1}}, {{2}} before sending.
     */
    public function submitToMeta(\App\Models\WhatsAppTemplate $template): array
    {
        if (config('whatsapp.mock')) {
            Log::info('[WhatsApp MOCK] Would submit template to Meta', ['template' => $template->meta_name]);
            $template->update(['meta_status' => 'APPROVED', 'status' => 'approved']);
            return ['success' => true, 'id' => 'mock_' . $template->id, 'error' => null];
        }

        $businessAccountId = config('whatsapp.business_account_id');
        $apiVersion        = config('whatsapp.api_version', 'v18.0');
        $apiBase           = config('whatsapp.api_base');

        // Convert named vars to numbered: {{name}} → {{1}}, {{date}} → {{2}}
        $variables  = $template->variables ?? [];
        $bodyText   = $template->body;
        foreach ($variables as $i => $var) {
            $bodyText = str_replace('{{' . $var . '}}', '{{' . ($i + 1) . '}}', $bodyText);
        }

        // Build example values (Meta requires sample text for each variable)
        $exampleValues  = $template->example_values ?? [];
        $bodyTextSamples = [];
        foreach ($variables as $var) {
            $bodyTextSamples[] = $exampleValues[$var] ?? $var;
        }

        $bodyComponent = ['type' => 'BODY', 'text' => $bodyText];
        if (!empty($bodyTextSamples)) {
            $bodyComponent['example'] = ['body_text' => [$bodyTextSamples]];
        }

        $components = [];

        // Header component
        $headerType = $template->header_type ?? 'none';
        if ($headerType === 'text' && !empty($template->header_text)) {
            $components[] = ['type' => 'HEADER', 'format' => 'TEXT', 'text' => $template->header_text];
        } elseif ($headerType === 'image') {
            $imageUrl = $template->header_image
                ? url('storage/' . $template->header_image)
                : null;
            if ($imageUrl) {
                $components[] = [
                    'type'    => 'HEADER',
                    'format'  => 'IMAGE',
                    'example' => ['header_handle' => [$imageUrl]],
                ];
            }
        } elseif ($headerType === 'document') {
            $docUrl = $template->header_document
                ? url('storage/' . $template->header_document)
                : null;
            if ($docUrl) {
                $components[] = [
                    'type'    => 'HEADER',
                    'format'  => 'DOCUMENT',
                    'example' => ['header_handle' => [$docUrl]],
                ];
            }
        }

        $components[] = $bodyComponent;

        $payload = [
            'name'       => $template->meta_name,
            'language'   => $template->language,
            'category'   => $template->category ?? 'MARKETING',
            'components' => $components,
        ];

        try {
            $response = Http::withToken($this->accessToken)
                ->post("{$apiBase}/{$apiVersion}/{$businessAccountId}/message_templates", $payload);

            if ($response->successful()) {
                return ['success' => true, 'id' => $response->json('id'), 'error' => null];
            }

            $errorBody = $response->json('error') ?? [];
            $error = $errorBody['error_user_msg'] ?? $errorBody['message'] ?? $response->body();
            Log::error('WhatsApp template submit failed', ['template' => $template->meta_name, 'error' => $errorBody]);
            return ['success' => false, 'id' => null, 'error' => $error];

        } catch (\Throwable $e) {
            Log::error('WhatsApp template submit exception', ['message' => $e->getMessage()]);
            return ['success' => false, 'id' => null, 'error' => $e->getMessage()];
        }
    }

    /**
     * Check approval status of a template from Meta and update the local record.
     */
    public function checkTemplateStatus(\App\Models\WhatsAppTemplate $template): array
    {
        $businessAccountId = config('whatsapp.business_account_id');
        $apiVersion        = config('whatsapp.api_version', 'v18.0');
        $apiBase           = config('whatsapp.api_base');

        try {
            $response = Http::withToken($this->accessToken)
                ->get("{$apiBase}/{$apiVersion}/{$businessAccountId}/message_templates", [
                    'name' => $template->meta_name,
                ]);

            if (!$response->successful()) {
                return ['success' => false, 'error' => $response->json('error.message') ?? $response->body()];
            }

            $data     = $response->json('data') ?? [];
            $metaItem = collect($data)->firstWhere('name', $template->meta_name);

            if (!$metaItem) {
                return ['success' => false, 'error' => 'Template not found on Meta yet.'];
            }

            $metaStatus = strtoupper($metaItem['status'] ?? 'PENDING');
            $reason     = $metaItem['rejected_reason'] ?? null;

            $update = ['meta_status' => $metaStatus, 'rejection_reason' => $reason];
            if ($metaStatus === 'APPROVED') {
                $update['status'] = 'approved';
            }

            $template->update($update);

            return ['success' => true, 'meta_status' => $metaStatus, 'reason' => $reason];

        } catch (\Throwable $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Send a Meta-approved template message.
     * $variables is an ordered array of string values matching template placeholders.
     */
    public function sendTemplate(string $phone, string $templateName, string $language, array $variables = []): array
    {
        // Mock mode — simulate without calling Meta API
        if (config('whatsapp.mock')) {
            $fakeWamid = 'wamid.mock_' . strtoupper(bin2hex(random_bytes(8)));
            Log::info('[WhatsApp MOCK] Would send template', [
                'phone'    => $phone,
                'template' => $templateName,
                'vars'     => $variables,
                'wamid'    => $fakeWamid,
            ]);
            return ['success' => true, 'wamid' => $fakeWamid, 'error' => null];
        }

        $phone = $this->normalizePhone($phone);

        $components = [];
        if (!empty($variables)) {
            $parameters = array_map(fn($v) => ['type' => 'text', 'text' => (string) $v], $variables);
            $components[] = ['type' => 'body', 'parameters' => $parameters];
        }

        $payload = [
            'messaging_product' => 'whatsapp',
            'to'                => $phone,
            'type'              => 'template',
            'template'          => [
                'name'     => $templateName,
                'language' => ['code' => $language],
                'components' => $components,
            ],
        ];

        try {
            $response = Http::withToken($this->accessToken)
                ->post("{$this->baseUrl}/messages", $payload);

            if ($response->successful()) {
                $wamid = $response->json('messages.0.id');
                return ['success' => true, 'wamid' => $wamid, 'error' => null];
            }

            $error = $response->json('error.message') ?? $response->body();
            Log::error('WhatsApp send failed', ['phone' => $phone, 'error' => $error]);
            return ['success' => false, 'wamid' => null, 'error' => $error];

        } catch (\Throwable $e) {
            Log::error('WhatsApp exception', ['phone' => $phone, 'message' => $e->getMessage()]);
            return ['success' => false, 'wamid' => null, 'error' => $e->getMessage()];
        }
    }

    /**
     * Send a template from a specific Phone Number ID (for per-user sender numbers).
     */
    public function sendTemplateFrom(string $phoneNumberId, string $phone, string $templateName, string $language, array $variables = []): array
    {
        if (config('whatsapp.mock')) {
            $fakeWamid = 'wamid.mock_' . strtoupper(bin2hex(random_bytes(8)));
            Log::info('[WhatsApp MOCK] Would send template from ' . $phoneNumberId, [
                'phone' => $phone, 'template' => $templateName,
            ]);
            return ['success' => true, 'wamid' => $fakeWamid, 'error' => null];
        }

        $phone = $this->normalizePhone($phone);

        $version  = config('whatsapp.api_version', 'v18.0');
        $apiBase  = config('whatsapp.api_base');
        $url      = "{$apiBase}/{$version}/{$phoneNumberId}/messages";

        $components = [];
        if (!empty($variables)) {
            $parameters = array_map(fn($v) => ['type' => 'text', 'text' => (string) $v], $variables);
            $components[] = ['type' => 'body', 'parameters' => $parameters];
        }

        $payload = [
            'messaging_product' => 'whatsapp',
            'to'                => $phone,
            'type'              => 'template',
            'template'          => [
                'name'       => $templateName,
                'language'   => ['code' => $language],
                'components' => $components,
            ],
        ];

        try {
            $response = Http::withToken($this->accessToken)->post($url, $payload);

            if ($response->successful()) {
                return ['success' => true, 'wamid' => $response->json('messages.0.id'), 'error' => null];
            }

            $error = $response->json('error.message') ?? $response->body();
            Log::error('WhatsApp sendTemplateFrom failed', ['phone' => $phone, 'error' => $error]);
            return ['success' => false, 'wamid' => null, 'error' => $error];

        } catch (\Throwable $e) {
            return ['success' => false, 'wamid' => null, 'error' => $e->getMessage()];
        }
    }

    /**
     * Strip formatting and ensure E.164 digits-only with country code.
     */
    public function normalizePhone(string $phone): string
    {
        // Remove all non-digit characters except leading +
        $cleaned = preg_replace('/[^\d]/', '', $phone);

        // Remove leading zeros
        $cleaned = ltrim($cleaned, '0');

        // If shorter than 10 digits, return as-is and let Meta reject it
        if (strlen($cleaned) < 10) {
            return $cleaned;
        }

        // If exactly 10 digits, prepend country code
        if (strlen($cleaned) === 10) {
            return $this->defaultCountryCode . $cleaned;
        }

        return $cleaned;
    }
}
