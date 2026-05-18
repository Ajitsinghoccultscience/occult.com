<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppCampaignContact extends Model
{
    protected $table = 'whatsapp_campaign_contacts';

    protected $fillable = [
        'campaign_id', 'phone', 'variables',
        'status', 'whatsapp_message_id', 'error_message', 'sent_at',
    ];

    protected $casts = [
        'variables' => 'array',
        'sent_at'   => 'datetime',
    ];

    public function campaign()
    {
        return $this->belongsTo(WhatsAppCampaign::class, 'campaign_id');
    }
}
