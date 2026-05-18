<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppCampaign extends Model
{
    protected $table = 'whatsapp_campaigns';

    protected $fillable = [
        'name', 'template_id', 'status',
        'total_count', 'sent_count', 'failed_count',
        'file_path', 'column_map',
        'launched_at', 'completed_at',
    ];

    protected $casts = [
        'column_map'   => 'array',
        'launched_at'  => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function template()
    {
        return $this->belongsTo(WhatsAppTemplate::class, 'template_id');
    }

    public function contacts()
    {
        return $this->hasMany(WhatsAppCampaignContact::class, 'campaign_id');
    }

    public function isEditable(): bool
    {
        return $this->status === 'draft';
    }
}
