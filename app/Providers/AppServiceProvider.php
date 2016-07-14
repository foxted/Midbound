<?php

namespace Midbound\Providers;

use Illuminate\Support\ServiceProvider;
use Midbound\Observers\ProspectObserver;
use Midbound\Prospect;

class AppServiceProvider extends ServiceProvider
{

    protected $observers = [
        Prospect::class => ProspectObserver::class
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
        //
    }

    /**
     * Register model observers
     */
    private function registerObservers()
    {
        foreach($this->observers as $model => $observer) {
            $model::observe($observer);
        }
    }
}
