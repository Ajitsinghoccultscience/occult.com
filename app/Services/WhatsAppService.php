<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    private string $endpoint;
    private string $accessToken;
    private string $defaultCountryCode;

    public function __construct()
    {
        $this->endpoint           = config('whatsapp.endpoint', '');
        $this->accessToken        = (string) config('whatsapp.access_token');
        $this->defaultCountryCode = config('whatsapp.default_country_code', '91');
    }

    /**
     * Send a WATI-approved template message.
     *
     * $variables may be either:
     *   - an associative map  ['name' => 'Vivek', 'date' => '20 May']   (preferred — WATI uses these names)
     *   - an ordered list      ['Vivek', '20 May']                       (names default to "1", "2", …)
     */
    public function sendTemplate(string $phone, string $templateName, string $language, array $variables = []): array
    {
        // Mock mode — simulate without calling WATI
        if (config('whatsapp.mock')) {
            $fakeId = 'wati.mock_' . strtoupper(bin2hex(random_bytes(8)));
            Log::info('[WhatsApp MOCK] Would send WATI template', [
                'phone'    => $phone,
                'template' => $templateName,
                'vars'     => $variables,
                'id'       => $fakeId,
            ]);
            return ['success' => true, 'wamid' => $fakeId, 'error' => null];
        }

        if ($this->endpoint === '' || $this->accessToken === '') {
            return ['success' => false, 'wamid' => null, 'error' => 'WATI is not configured. Set WATI_API_ENDPOINT and WATI_ACCESS_TOKEN.'];
        }

        $phone = $this->normalizePhone($phone);

        $payload = [
            'template_name'  => $templateName,
            'broadcast_name' => $templateName . '_' . now()->format('YmdHis'),
            'parameters'     => $this->buildParameters($variables),
        ];

        try {
            $response = Http::withToken($this->accessToken)
                ->acceptJson()
                ->connectTimeout(15)
                ->timeout(60)
                ->post("{$this->endpoint}/api/v1/sendTemplateMessage?whatsappNumber={$phone}", $payload);

            // WATI returns HTTP 200 with {"result": true, ...} on success.
            $json   = $response->json() ?? [];
            $result = $json['result'] ?? null;
            $ok     = $response->successful() && ($result === true || $result === 'true' || $result === 'success');

            // WATI accepted the request, but the number isn't a usable WhatsApp number.
            if ($ok && array_key_exists('validWhatsAppNumber', $json) && $json['validWhatsAppNumber'] === false) {
                return ['success' => false, 'wamid' => null, 'error' => 'Not a valid WhatsApp number.'];
            }

            if ($ok) {
                $id = $json['local_message_id']
                    ?? $json['id']
                    ?? ($json['info']['messageId'] ?? null)
                    ?? ($json['messageId'] ?? null);
                return ['success' => true, 'wamid' => $id, 'error' => null];
            }

            $error = $json['info'] ?? $json['error'] ?? $json['message'] ?? $response->body();
            if (is_array($error)) {
                $error = json_encode($error);
            }
            Log::error('WATI send failed', ['phone' => $phone, 'template' => $templateName, 'response' => $json ?: $response->body()]);
            return ['success' => false, 'wamid' => null, 'error' => $error];

        } catch (\Throwable $e) {
            Log::error('WATI send exception', ['phone' => $phone, 'message' => $e->getMessage()]);
            return ['success' => false, 'wamid' => null, 'error' => $e->getMessage()];
        }
    }

    /**
     * Kept for backward compatibility with the per-sender (Meta phone-number-id) flow.
     * WATI uses a single tenant number, so the id is ignored and this delegates to sendTemplate().
     */
    public function sendTemplateFrom(string $phoneNumberId, string $phone, string $templateName, string $language, array $variables = []): array
    {
        return $this->sendTemplate($phone, $templateName, $language, $variables);
    }

    /**
     * Build WATI's parameter array: [['name' => 'x', 'value' => 'y'], ...].
     * Associative keys are used as names; a plain list falls back to "1", "2", …
     */
    private function buildParameters(array $variables): array
    {
        $parameters = [];
        $isList = array_keys($variables) === range(0, count($variables) - 1);

        foreach ($variables as $key => $value) {
            $name = $isList ? (string) ($key + 1) : (string) $key;
            $parameters[] = ['name' => $name, 'value' => (string) $value];
        }

        return $parameters;
    }

    /**
     * Strip formatting and ensure digits-only with country code.
     */
    public function normalizePhone(string $phone): string
    {
        // Remove all non-digit characters
        $cleaned = preg_replace('/[^\d]/', '', $phone);

        // Remove leading zeros
        $cleaned = ltrim($cleaned, '0');

        // If shorter than 10 digits, return as-is and let WATI reject it
        if (strlen($cleaned) < 10) {
            return $cleaned;
        }

        // If exactly 10 digits, prepend country code
        if (strlen($cleaned) === 10) {
            return $this->defaultCountryCode . $cleaned;
        }

        return $cleaned;
    }

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    | With WATI, templates are created and submitted for approval from inside
    | the WATI dashboard (Broadcast → Templates), not via API. These methods
    | are kept so the admin UI keeps working, but they no longer call Meta.
    */

    /**
     * Templates are managed in the WATI dashboard. In mock mode we auto-approve.
     */
    public function submitToMeta(\App\Models\WhatsAppTemplate $template): array
    {
        if (config('whatsapp.mock')) {
            $template->update(['meta_status' => 'APPROVED', 'status' => 'approved']);
            return ['success' => true, 'id' => 'mock_' . $template->id, 'error' => null];
        }

        return [
            'success' => false,
            'id'      => null,
            'error'   => 'Templates are created and approved in the WATI dashboard (Broadcast → Templates). Create it there with the same name, then mark it approved here.',
        ];
    }

    /**
     * No programmatic status check with WATI — manage approval in the dashboard.
     */
    public function checkTemplateStatus(\App\Models\WhatsAppTemplate $template): array
    {
        return [
            'success' => false,
            'error'   => 'Template status is managed in the WATI dashboard. Once approved there, mark this template approved manually.',
        ];
    }

    /**
     * Fetch all message templates from WATI so they can be imported into the dashboard.
     * Returns ['success' => bool, 'templates' => array, 'error' => ?string] where each
     * template is normalized to this app's fields.
     */
    public function fetchTemplates(): array
    {
        if ($this->endpoint === '' || $this->accessToken === '') {
            return ['success' => false, 'templates' => [], 'error' => 'WATI is not configured. Set WATI_API_ENDPOINT and WATI_ACCESS_TOKEN.'];
        }

        try {
            $response = Http::withToken($this->accessToken)
                ->acceptJson()
                ->get("{$this->endpoint}/api/v1/getMessageTemplates", ['pageSize' => 200, 'pageNumber' => 1]);

            if (!$response->successful()) {
                return ['success' => false, 'templates' => [], 'error' => $response->json('message') ?? $response->body()];
            }

            $json  = $response->json() ?? [];
            // WATI may return the list under different keys depending on plan/version.
            $items = $json['messageTemplates'] ?? $json['data'] ?? $json['templates'] ?? [];

            $templates = [];
            foreach ($items as $item) {
                $templates[] = $this->normalizeWatiTemplate($item);
            }

            return ['success' => true, 'templates' => $templates, 'error' => null];

        } catch (\Throwable $e) {
            Log::error('WATI fetchTemplates exception', ['message' => $e->getMessage()]);
            return ['success' => false, 'templates' => [], 'error' => $e->getMessage()];
        }
    }

    /**
     * Map a raw WATI template item to this app's template fields.
     */
    private function normalizeWatiTemplate(array $item): array
    {
        $metaName = $this->scalar($item['elementName'] ?? $item['name'] ?? $item['template_name'] ?? '');
        $body     = $this->scalar($item['bodyOriginal'] ?? $item['body'] ?? $item['bodyText'] ?? '');
        $status   = strtoupper($this->scalar($item['status'] ?? 'APPROVED'));

        // Variable names: prefer WATI's customParams, else parse {{...}} from the body.
        $variables = [];
        if (!empty($item['customParams']) && is_array($item['customParams'])) {
            foreach ($item['customParams'] as $p) {
                $variables[] = (string) ($p['paramName'] ?? $p['name'] ?? '');
            }
            $variables = array_values(array_filter($variables));
        }
        if (empty($variables) && $body) {
            preg_match_all('/\{\{(\w+)\}\}/', $body, $m);
            $variables = array_values(array_unique($m[1]));
        }

        $language = $this->scalar($item['language'] ?? $item['languageCode'] ?? 'en') ?: 'en';
        $category = strtoupper($this->scalar($item['category'] ?? 'MARKETING')) ?: 'MARKETING';

        return [
            'meta_name'   => $metaName,
            'name'        => $this->scalar($item['name'] ?? $metaName),
            'language'    => $language,
            'category'    => $category,
            'body'        => $body,
            'variables'   => $variables,
            'status'      => $status === 'APPROVED' ? 'approved' : 'draft',
            'meta_status' => $status,
        ];
    }

    /**
     * Coerce a WATI field to a plain string. WATI sometimes returns nested
     * objects/arrays (e.g. language as {"key":"en","value":"English"}).
     */
    private function scalar($value): string
    {
        if (is_array($value)) {
            $value = $value['value'] ?? $value['key'] ?? $value['text'] ?? $value['code']
                ?? (reset($value) ?: '');
        }
        return is_scalar($value) ? (string) $value : '';
    }
}
