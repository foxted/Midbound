<?php

namespace Midbound\Providers;

use Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Midbound\Bindings\ProspectBinding;
use Midbound\Bindings\WebsiteBinding;

/**
 * Class RouteServiceProvider
 * @package Midbound\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    protected $modelBindings = [
        'prospect' => ProspectBinding::class,
        'website' => WebsiteBinding::class,
    ];
    
    /**
     * This namespace is applied to your controller routes.
     * @var string
     */
    protected $namespace = 'Midbound\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->registerBindings();
    }

    /**
     * Define the routes for the application.
     * @return void
     */
    public function map()
    {
        $this->mapGuestRoutes();
        $this->mapPublicRoutes();
        $this->mapAppRoutes();
        $this->mapApiRoutes();
    }

    /**
     * Define the guest routes for the application (no authentication).
     * @return void
     */
    protected function mapGuestRoutes()
    {
        Route::group([
            'namespace' => $this->namespace,
            'middleware' => ['web', 'guest'],
        ], function ($router) {
            require base_path('routes/guest.php');
        });
    }

    /**
     * Define the guest routes for the application (no authentication).
     * @return void
     */
    protected function mapPublicRoutes()
    {
        Route::group([
            'namespace' => $this->namespace,
            'middleware' => ['web'],
        ], function ($router) {
            require base_path('routes/public.php');
        });
    }

    /**
     * Define the application routes (behind authentication).
     * @return void
     */
    protected function mapAppRoutes()
    {
        Route::group([
            'namespace' => $this->namespace,
            'middleware' => ['web', 'auth:web', 'hasTeam'],
            'as' => 'app.'
        ], function ($router) {
            require base_path('routes/app.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'namespace' => $this->namespace . '\API',
            'prefix' => 'api',
            'middleware' => ['api']
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }

    /**
     * Register bindings
     */
    private function registerBindings()
    {
        foreach ($this->modelBindings as $parameter => $binding) {
            Route::bind($parameter, $binding);
        }
    }
}
