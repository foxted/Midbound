<?php

return [

    'mailchimp' => [
        'key' => env('MAILCHIMP_KEY'),
        'list' => env('MAILCHIMP_LIST')
    ],

    'authy' => [
        'secret' => env('AUTHY_SECRET'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'stripe' => [
        'model'  => Midbound\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
