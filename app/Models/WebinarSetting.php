<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebinarSetting extends Model
{
    protected $fillable = [
        'key', 'webinar_name', 'event_date', 'event_date_short',
        'attend_date', 'event_time', 'whatsapp_url', 'price', 'description',
    ];

    public static function forKey(string $key): ?self
    {
        return static::where('key', $key)->first();
    }

    public function toConfig(): array
    {
        return [
            'webinar_name'     => $this->webinar_name,
            'event_date'       => $this->event_date,
            'event_date_short' => $this->event_date_short,
            'attend_date'      => $this->attend_date,
            'event_time'       => $this->event_time,
            'whatsapp'         => $this->whatsapp_url,
            'price'            => $this->price,
            'description'      => $this->description,
        ];
    }
}
