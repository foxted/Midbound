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
        'default' => 1000,
        'limits' => [
            250,
            500,
            1000,
            2500,
            5000,
            10000,
            -1
        ],
        'basic' => [
            'basic-250' => [
                'name' => 'Basic 250',
                'price' => 19.99,
                'attributes' => [
                    'limit' => 250,
                    'category' => 'basic'
                ]
            ],
            'basic-500' => [
                'name' => 'Basic 500',
                'price' => 35.99,
                'attributes' => [
                    'limit' => 500,
                    'category' => 'basic'
                ]
            ],
            'basic-1000' => [
                'name' => 'Basic 1K',
                'price' => 59.99,
                'attributes' => [
                    'limit' => 1000,
                    'category' => 'basic'
                ]
            ],
            'basic-2500' => [
                'name' => 'Basic 2.5K',
                'price' => 79.99,
                'attributes' => [
                    'limit' => 2500,
                    'category' => 'basic'
                ]
            ],
            'basic-5000' => [
                'name' => 'Basic 5K',
                'price' => 99.99,
                'attributes' => [
                    'limit' => 5000,
                    'category' => 'basic'
                ]
            ],
            'basic-10000' => [
                'name' => 'Basic 10K',
                'price' => 119.99,
                'attributes' => [
                    'limit' => 10000,
                    'category' => 'basic'
                ]
            ],
            'basic-unlimited' => [
                'name' => 'Basic Unlimited',
                'price' => 499.99,
                'attributes' => [
                    'limit' => -1,
                    'category' => 'basic'
                ]
            ]
        ],
        'pro' => [
            'pro-250' => [
                'name' => 'Pro 250',
                'price' => 49.99,
                'attributes' => [
                    'limit' => 250,
                    'category' => 'pro'
                ]
            ],
            'pro-500' => [
                'name' => 'Pro 500',
                'price' => 89.99,
                'attributes' => [
                    'limit' => 500,
                    'category' => 'pro'
                ]
            ],
            'pro-1000' => [
                'name' => 'Pro 1K',
                'price' => 149.99,
                'attributes' => [
                    'limit' => 1000,
                    'category' => 'pro'
                ]
            ],
            'pro-2500' => [
                'name' => 'Pro 2.5K',
                'price' => 199.99,
                'attributes' => [
                    'limit' => 2500,
                    'category' => 'pro'
                ]
            ],
            'pro-5000' => [
                'name' => 'Pro 5K',
                'price' => 249.99,
                'attributes' => [
                    'limit' => 5000,
                    'category' => 'pro'
                ]
            ],
            'pro-10000' => [
                'name' => 'Pro 10K',
                'price' => 299.99,
                'attributes' => [
                    'limit' => 10000,
                    'category' => 'pro'
                ]
            ],
            'pro-unlimited' => [
                'name' => 'Pro Unlimited',
                'price' => 899.99,
                'attributes' => [
                    'limit' => -1,
                    'category' => 'pro'
                ]
            ]
        ]
    ]
];