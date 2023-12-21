<?php

namespace DDD\Package\Providers\Base;

use Illuminate\Support\ServiceProvider;

abstract class BasePackageServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {

    }

    // protected function registerNamespaces()
    // {
    //     $configPath = __DIR__ . '/../Config/config.php';
    //     $stubsPath = dirname(__DIR__) . '/Commands/stubs';

    //     $this->publishes([
    //         $configPath => config_path('package.php')
    //     ], 'config');

    //     $this->publishes([
    //         $stubsPath => base_path('stubs/package-stubs'),
    //     ], 'stubs');
    // }

    // protected function registerPackage()
    // {
    //     $this->app->register(BootstrapServiceProvider::class);
    // }
}
