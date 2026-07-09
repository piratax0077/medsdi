<?php

return [

    'driver' => env('MENSAJERIA_DRIVER', 'log'),

    'country_code' => env('MENSAJERIA_COUNTRY_CODE', '56'),

    'twilio' => [
        'sid'   => env('TWILIO_SID'),
        'token' => env('TWILIO_AUTH_TOKEN'),
        'from'  => env('TWILIO_WHATSAPP_FROM'),
    ],

];
