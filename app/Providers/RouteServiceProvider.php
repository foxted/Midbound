<?php

namespace Midbound\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Midbound\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapGuestRoutes($router);
        $this->mapAppRoutes($router);
        $this->mapApiRoutes($router);
    }

    /**
     * Define the guest routes for the application (no authentication).
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapGuestRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => ['web', 'guest', 'hasTeam'],
        ], function ($router) {
            require app_path('Http/guest.php');
        });
    }

    /**
     * Define the application routes (behind authentication).
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapAppRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
            'middleware' => ['web', 'auth:web', 'hasTeam'],
            'as' => 'app.'
        ], function ($router) {
            require app_path('Http/app.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapApiRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
        ], function ($router) {
            require app_path('Http/api.php');
        });
    }
}
