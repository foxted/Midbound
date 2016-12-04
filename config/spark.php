<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    */
    'roles' => [
        'member' => 'Member',
        'owner' => 'Owner',
    ],

    /*
    |--------------------------------------------------------------------------
    | Free Trial duration (in days)
    |--------------------------------------------------------------------------
    */
    'trial' => 30,

    /*
    |--------------------------------------------------------------------------
    | Features per category
    |--------------------------------------------------------------------------
    */
    'features' => [
        'basic' => [
            'Unlimited Users',
            'Capture New Prospects',
            'Track Prospect Activity'
        ],
        'pro' => [
            'Unlimited Users',
            'Capture New Prospects',
            'Track Prospect Activity',
            'Unlimited Flows'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Plans
    |--------------------------------------------------------------------------
    */
    'plans' => [
        'basic' => [
            'basic-250' => [
                'name' => 'Basic',
                'price' => 19.99,
                'attributes' => [
                    'limit' => 250,
                    'category' => 'basic'
                ]
            ],
            'basic-500' => [
                'name' => 'Basic',
                'price' => 35.99,
                'attributes' => [
                    'limit' => 500,
                    'category' => 'basic'
                ]
            ],
            'basic-1000' => [
                'name' => 'Basic',
                'price' => 59.99,
                'attributes' => [
                    'limit' => 1000,
                    'category' => 'basic'
                ]
            ],
            'basic-2500' => [
                'name' => 'Basic',
                'price' => 79.99,
                'attributes' => [
                    'limit' => 2500,
                    'category' => 'basic'
                ]
            ],
            'basic-5000' => [
                'name' => 'Basic',
                'price' => 99.99,
                'attributes' => [
                    'limit' => 5000,
                    'category' => 'basic'
                ]
            ],
            'basic-10000' => [
                'name' => 'Basic',
                'price' => 119.99,
                'attributes' => [
                    'limit' => 10000,
                    'category' => 'basic'
                ]
            ]
        ],
        'pro' => [
            'pro-250' => [
                'name' => 'Pro',
                'price' => 49.99,
                'attributes' => [
                    'limit' => 250,
                    'category' => 'pro'
                ]
            ],
            'pro-500' => [
                'name' => 'Pro',
                'price' => 89.99,
                'attributes' => [
                    'limit' => 500,
                    'category' => 'pro'
                ]
            ],
            'pro-1000' => [
                'name' => 'Pro',
                'price' => 149.99,
                'attributes' => [
                    'limit' => 1000,
                    'category' => 'pro'
                ]
            ],
            'pro-2500' => [
                'name' => 'Pro',
                'price' => 199.99,
                'attributes' => [
                    'limit' => 2500,
                    'category' => 'pro'
                ]
            ],
            'pro-5000' => [
                'name' => 'Pro',
                'price' => 249.99,
                'attributes' => [
                    'limit' => 5000,
                    'category' => 'pro'
                ]
            ],
            'pro-10000' => [
                'name' => 'Pro',
                'price' => 299.99,
                'attributes' => [
                    'limit' => 10000,
                    'category' => 'pro'
                ]
            ]
        ]
    ]
];