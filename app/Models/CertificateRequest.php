<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'certificate_type',
        'review_text',
        'certificate_date',
        'mail_sent_at',
        'mail_error',
    ];

    protected $casts = [
        'certificate_date' => 'date',
        'mail_sent_at' => 'datetime',
    ];
}
