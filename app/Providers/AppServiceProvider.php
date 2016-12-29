<?php

namespace Midbound\Providers;

use Laravel\Spark as Spark;
use Illuminate\Support\ServiceProvider;
use Midbound\Http\Requests\Auth\RegisterRequest;
use Midbound\Http\Requests\Settings\Teams\CreateInvitationRequest;
use Midbound\Http\Requests\Settings\Teams\RemoveTeamMemberRequest;
use Midbound\Observers\ProspectObserver;
use Midbound\Observers\VisitorEventObserver;
use Midbound\Observers\WebsiteObserver;
use Midbound\Prospect;
use Midbound\VisitorEvent;
use Midbound\Website;

class AppServiceProvider extends ServiceProvider
{

    protected $observers = [
        Prospect::class => ProspectObserver::class,
        VisitorEvent::class => VisitorEventObserver::class,
        Website::class => WebsiteObserver::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerObservers();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->overrideRegistration();
        $this->overrideTeamMemberPermissions();
        $this->overrideInvitationRequest();
    }

    /**
     * Register model observers
     */
    private function registerObservers()
    {
        foreach ($this->observers as $model => $observer) {
            $model::observe($observer);
        }
    }

    /**
     * Override user registration request validation
     */
    private function overrideRegistration()
    {
        $this->app->instance(
            Spark\Contracts\Http\Requests\Auth\RegisterRequest::class,
            RegisterRequest::class
        );
    }

    /**
     * Overrides team member permissions
     */
    private function overrideTeamMemberPermissions()
    {
        $this->app->instance(
            Spark\Http\Requests\Settings\Teams\RemoveTeamMemberRequest::class,
            RemoveTeamMemberRequest::class
        );
    }

    /**
     * Overrides invitation request validation
     */
    private function overrideInvitationRequest()
    {
        $this->app->instance(
            Spark\Http\Requests\Settings\Teams\CreateInvitationRequest::class,
            CreateInvitationRequest::class
        );
    }
}
