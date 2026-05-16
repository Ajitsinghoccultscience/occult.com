<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebinarSetting;

class WebinarSettingSeeder extends Seeder
{
    public function run(): void
    {
        $webinars = [
            [
                'key'              => 'astrology',
                'webinar_name'     => 'Astrology Webinar',
                'event_date'       => 'Sat, 16th May, 2026',
                'event_date_short' => '16 May',
                'attend_date'      => 'May 16',
                'event_time'       => '2:00 PM to 4:00 PM',
                'whatsapp_url'     => 'https://chat.whatsapp.com/KyIhA0PgjCiBZ1IAIQretG',
                'price'            => '49',
                'description'      => '',
            ],
            [
                'key'              => 'graphology',
                'webinar_name'     => 'Graphology Webinar',
                'event_date'       => 'Wed, 20th May, 2026',
                'event_date_short' => '20 May',
                'attend_date'      => 'May 20',
                'event_time'       => '11:00 AM to 1:00 PM',
                'whatsapp_url'     => 'https://chat.whatsapp.com/I2CkgB7cf2O64vPoV6KXbC',
                'price'            => '99',
                'description'      => '',
            ],
        ];

        foreach ($webinars as $data) {
            WebinarSetting::updateOrCreate(
                ['key' => $data['key']],
                $data
            );
        }
    }
}
