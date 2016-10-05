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
    'url' => 'https://cdn.midbound.com/midbound.js',

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

    /*
    |--------------------------------------------------------------------------
    | Allowed fields
    |--------------------------------------------------------------------------
    |
    | List of fields that the capture event supports
    |
    */
    'allowed-fields' => [
        'name', 'email', 'phone', 'company'
    ],

    /*
    |--------------------------------------------------------------------------
    | Verbs
    |--------------------------------------------------------------------------
    |
    | List of events translated into verbs to display
    |
    */
    'verbs' => [
        'pageview' => 'Visited',
        'download' => 'Downloaded',
        'subscribe' => 'Subscribed to',
        'click' => 'Clicked on',
        'capture' => 'Entered'
    ],
];
