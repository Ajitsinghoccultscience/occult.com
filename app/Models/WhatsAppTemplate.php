<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppTemplate extends Model
{
    protected $table = 'whatsapp_templates';

    protected $fillable = ['name', 'meta_name', 'language', 'category', 'header_type', 'header_text', 'header_image', 'header_document', 'body', 'variables', 'example_values', 'status', 'meta_status', 'rejection_reason'];

    protected $casts = [
        'variables'      => 'array',
        'example_values' => 'array',
    ];

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function campaigns()
    {
        return $this->hasMany(WhatsAppCampaign::class, 'template_id');
    }

    public function extractVariables(): array
    {
        preg_match_all('/\{\{(\w+)\}\}/', $this->body, $matches);
        return array_values(array_unique($matches[1]));
    }
}
