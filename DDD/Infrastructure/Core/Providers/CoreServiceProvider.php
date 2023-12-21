<?php

namespace DDD\Infrastructure\Core\Providers;

use DDD\Infrastructure\Core\Middlewares\PlatformMiddleware;
use DDD\Infrastructure\Core\Middlewares\XssPreventionMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class CoreServiceProvider extends ServiceProvider
{
    protected $layer = 'I';

    public function register()
    {
        $this->mergeConfig();
    }

    public function boot()
    {
        $this->bootConfig();
        $this->bootMiddleware();
    }

    public function configName()
    {
        return 'ddd_core';
    }

    public function mergeConfig()
    {
        $this->mergeConfigFrom(ddd_path($this->layer, 'Core/Config/config.php'), $this->configName());
    }

    public function bootConfig()
    {
        $this->publishes([ ddd_path($this->layer, 'Core/Config/config.php') => config_path($this->configName().'.php') ], 'config');
    }

    public function bootMiddleware()
    {
        /** @var Router */
        $router = $this->app['router'];

        $router->aliasMiddleware('ddd.core.xss_prevention', XssPreventionMiddleware::class);
        $router->aliasMiddleware('ddd.core.platform', PlatformMiddleware::class);
    }
}
