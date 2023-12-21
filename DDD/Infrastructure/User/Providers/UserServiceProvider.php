<?php

namespace DDD\Infrastructure\User\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
    }

    public function boot()
    {

    }
}
