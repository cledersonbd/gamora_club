<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'rollbar' => [
        'access_token' => env('ROLLBAR_TOKEN','4f35fc640059487a83175a9346ba9181'),
        'level' => env('ROLLBAR_LEVEL','error'),
    ],

    'pagseguro' => [
//        'app' => [
//            'id' => 'app8645223602',
//            'key' => 'ACAD16678F8FCC87740D5FA84B1F9641',
//        ],
//        'seller' => [
//            'email' => 'v35249451689875999797@sandbox.pagseguro.com.br',//sandbox
//            'senha' => '12u66j993p866551',
//            'publickey' => 'PUB38386CCE93D14CDBA30F27CD21A2178C'
//        ],
        'email' => 'vitor.lobs@gmail.com',
//        'token' => 'DAF005C670FA4D13B0A77897580F4EEB',//production
        'token' => '7D0F33B7E2A34976A42E713F84FF1585',//sandbox

    ]
];
