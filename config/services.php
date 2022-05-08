<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'google' => [
        'client_id'     => '35095267573-7hv1v49411rh6f0oi5i3s1c1kq561lsk.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'http://127.0.0.1:8000/callbackGoogle',
    ],

    'facebook' => [
        'client_id'     => '398902332090240',
        'client_secret' => '18e09cb9c11cc84776b2e6f818c059ee',
        'redirect'      => 'http://localhost:8000/callback',
    ],

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

];
