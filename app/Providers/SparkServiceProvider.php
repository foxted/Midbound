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
        'vendor' => 'Midbound',
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
        $this->configureSpark();
        $this->registerPlans();
    }

    /**
     * Register method
     */
    public function register()
    {
        Spark::useUserModel(\Midbound\User::class);
        Spark::useTeamModel(\Midbound\Team::class);
    }

    /**
     *
     */
    protected function configureSpark()
    {
        Spark::useStripe()->noCardUpFront()->teamTrialDays(config('spark.trial'));
        Spark::useRoles(config('spark.roles'));
    }

    /**
     *
     */
    protected function registerPlans()
    {
        $basicPlans = config('spark.plans.basic');
        $proPlans = config('spark.plans.pro');

        foreach($basicPlans as $stripeId => $plan) {
            Spark::teamPlan($plan['name'], $stripeId)
                ->price($plan['price'])
                ->features(config('spark.features.basic'))
                ->attributes($plan['attributes']);
        }

        foreach($proPlans as $stripeId => $plan) {
            Spark::teamPlan($plan['name'], $stripeId)
                ->price($plan['price'])
                ->features(config('spark.features.pro'))
                ->attributes($plan['attributes']);
        }
    }
}
