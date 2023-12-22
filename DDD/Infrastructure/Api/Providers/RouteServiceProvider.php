<?php

namespace DDD\Infrastructure\Api\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function boot()
    {
    }

    public function map()
    {
        $this->mapUserApiRoutes();
    }

    protected function mapUserApiRoutes()
    {
        Route::group([
            'prefix' => 'api',
            // 'middleware' => ['ddd.user_api'],
        ], function() {
            $this->loadRoutesFrom(ddd_path('Presentation', 'Routes/Api/user.php'));
            $this->loadRoutesFrom(ddd_path('Presentation', 'Routes/Api/booking.php'));
        });
    }
}
