<?php

return [
    'phone_number_id'      => env('WHATSAPP_PHONE_NUMBER_ID'),
    'business_account_id'  => env('WHATSAPP_BUSINESS_ACCOUNT_ID'),
    'access_token'         => env('WHATSAPP_ACCESS_TOKEN'),
    'webhook_verify_token' => env('WHATSAPP_WEBHOOK_VERIFY_TOKEN'),
    'app_secret'           => env('WHATSAPP_APP_SECRET'),
    'api_version'          => env('WHATSAPP_API_VERSION', 'v18.0'),
    'api_base'             => 'https://graph.facebook.com',
    'default_country_code' => env('WHATSAPP_DEFAULT_COUNTRY_CODE', '91'),
    'mock'                 => env('WHATSAPP_MOCK', false),
];
