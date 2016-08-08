<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Session lifetime
    |--------------------------------------------------------------------------
    |
    | This value represent the lifetime of a visitor session (in seconds)
    |
    */
    'lifetime' => 86400,

    /*
    |--------------------------------------------------------------------------
    | Tracker Script URL
    |--------------------------------------------------------------------------
    |
    | URL to the tracking scripts midbound.js
    |
    */
    'url' => '../midbound.js',

    /*
    |--------------------------------------------------------------------------
    | Allowed events
    |--------------------------------------------------------------------------
    |
    | List of events that the tracking script supports
    |
    */
    'allowed-events' => [
        'pageview', 'download', 'subscribe', 'click', 'capture'
    ],
];
