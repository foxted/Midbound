<?php

namespace Midbound\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;
use Midbound\User;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Projet Secondaire',
        'product' => 'Midbound',
        'street' => '',
        'location' => 'Vancouver, BC',
        'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'alhankeser@gmail.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'valentin@whatdafox.com',
        'alhankeser@gmail.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront()->teamTrialDays(10);

        Spark::freeTeamPlan()
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::teamPlan('Basic', 'provider-id-1')
            ->price(10)
            ->features([
                'First', 'Second', 'Third'
            ]);
    }

    /**
     * Register method
     */
    public function register()
    {
        Spark::useUserModel(\Midbound\User::class);
        Spark::useTeamModel(\Midbound\Team::class);
    }
}
