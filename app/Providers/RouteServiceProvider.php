<?php

namespace Midbound\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Midbound\Bindings\ProspectBinding;
use Midbound\Bindings\WebsiteBinding;

/**
 * Class RouteServiceProvider
 * @package Midbound\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    protected $modelBindings = [
        'prospects' => ProspectBinding::class,
        'websites' => WebsiteBinding::class,
    ];
    
    /**
     * This namespace is applied to your controller routes.
     * @var string
     */
    protected $namespace = 'Midbound\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->registerBindings($router);

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapGuestRoutes($router);
        $this->mapPublicRoutes($router);
        $this->mapAppRoutes($router);
        $this->mapApiRoutes($router);
    }

    /**
     * Define the guest routes for the application (no authentication).
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapGuestRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
            'middleware' => ['web', 'guest'],
        ], function ($router) {
            require app_path('Http/guest.php');
        });
    }

    /**
     * Define the guest routes for the application (no authentication).
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapPublicRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
            'middleware' => ['web'],
        ], function ($router) {
            require app_path('Http/public.php');
        });
    }

    /**
     * Define the application routes (behind authentication).
     * @param  \Illuminate\Routing\Router $router
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
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapApiRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace . '\API',
            'prefix' => 'api',
            'middleware' => ['auth:api']
        ], function ($router) {
            require app_path('Http/api.php');
        });
    }

    private function registerBindings(Router $router)
    {
        foreach ($this->modelBindings as $parameter => $binding) {
            $router->bind($parameter, $binding);
        }
    }
}
