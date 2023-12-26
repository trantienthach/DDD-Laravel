<?php

namespace DDD\Infrastructure\Booking\Providers;

use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
    }

    public function boot()
    {

    }
}
