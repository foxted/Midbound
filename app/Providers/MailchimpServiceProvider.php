<?php

namespace Midbound\Providers;

use Illuminate\Support\ServiceProvider;
use Mailchimp;

class MailchimpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Mailchimp::class, function() {
            return new Mailchimp(config('services.mailchimp.key'));
        });
    }
}
