<?php

namespace DDD\Package\Providers;

use DDD\Package\Interfaces\PackageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app[PackageRepositoryInterface::class]->boot();
    }

    public function boot()
    {
        $this->app[PackageRepositoryInterface::class]->register();
    }
}
