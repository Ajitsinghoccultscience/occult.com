<?php

return [
    /*
    |--------------------------------------------------------------------------
    | WATI (WhatsApp Team Inbox) API
    |--------------------------------------------------------------------------
    | Messages are sent through WATI instead of the Meta Cloud API.
    | Grab these from your WATI dashboard → API Docs.
    |
    |  WATI_API_ENDPOINT  e.g. https://live-mt-server.wati.io/{tenantId}
    |  WATI_ACCESS_TOKEN  the Bearer token shown in WATI → API Docs
    */
    'endpoint'             => rtrim((string) env('WATI_API_ENDPOINT', ''), '/'),
    'access_token'         => env('WATI_ACCESS_TOKEN'),

    'default_country_code' => env('WHATSAPP_DEFAULT_COUNTRY_CODE', '91'),

    // When true, no real API call is made — sends are simulated and logged.
    'mock'                 => env('WHATSAPP_MOCK', false),

    // Inbound webhook (WATI can POST message events here).
    'webhook_verify_token' => env('WHATSAPP_WEBHOOK_VERIFY_TOKEN'),
];
