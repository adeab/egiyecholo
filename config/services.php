<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    //for testing purpose
    'facebook' => [
        'client_id' => '1892690367681906',
        'client_secret' => '912867b128bbd564b1dd09eff889c789',
        'redirect' => 'https://egiye-cholo.com/callback/facebook',
      ],
      
    //actual one
    // 'facebook' => [
    //     'client_id' => 'xxxx',
    //     'client_secret' => 'xxx',
    //     'redirect' => 'https://www.tutsmake.com/laravel-example/callback/facebook',
    //   ], 

];
