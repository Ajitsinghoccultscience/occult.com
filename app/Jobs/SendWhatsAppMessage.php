<?php

namespace App\Jobs;

use App\Models\WhatsAppCampaign;
use App\Models\WhatsAppCampaignContact;
use App\Services\WhatsAppService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Queue\SerializesModels;
use Throwable;

class SendWhatsAppMessage implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public int $tries   = 3;
    public int $backoff = 60;

    public function __construct(public WhatsAppCampaignContact $contact) {}

    public function middleware(): array
    {
        return [new RateLimited('whatsapp')];
    }

    public function handle(WhatsAppService $whatsApp): void
    {
        // Reload fresh — abort if already processed (idempotency guard)
        $contact = $this->contact->fresh();
        if (!$contact || $contact->status !== 'pending') {
            return;
        }

        $campaign = $contact->campaign()->with('template')->first();
        $template = $campaign->template;

        // Build named variables map (varName => value) for WATI parameters
        $namedVars = [];
        foreach (($template->variables ?? []) as $varName) {
            $namedVars[$varName] = $contact->variables[$varName] ?? '';
        }

        $result = $whatsApp->sendTemplate(
            $contact->phone,
            $template->meta_name,
            $template->language,
            $namedVars
        );

        if ($result['success']) {
            $contact->update([
                'status'               => 'sent',
                'whatsapp_message_id'  => $result['wamid'],
                'sent_at'              => now(),
            ]);
            WhatsAppCampaign::where('id', $campaign->id)->increment('sent_count');
        } else {
            $contact->update([
                'status'        => 'failed',
                'error_message' => $result['error'],
            ]);
            WhatsAppCampaign::where('id', $campaign->id)->increment('failed_count');
        }

        // Mark campaign completed if all contacts are done
        $pending = WhatsAppCampaignContact::where('campaign_id', $campaign->id)
            ->where('status', 'pending')
            ->count();

        if ($pending === 0) {
            $campaign->update(['status' => 'completed', 'completed_at' => now()]);
        }
    }

    public function failed(Throwable $e): void
    {
        $this->contact->update([
            'status'        => 'failed',
            'error_message' => $e->getMessage(),
        ]);

        WhatsAppCampaign::where('id', $this->contact->campaign_id)->increment('failed_count');
    }
}
