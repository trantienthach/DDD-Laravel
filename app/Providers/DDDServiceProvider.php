<?php

namespace App\Providers;

use DDD\Infrastructure\Api\Providers\ApiServiceProvider;
use DDD\Infrastructure\Core\Providers\CoreServiceProvider;
use DDD\Infrastructure\Kafka\Providers\KafkaServiceProvider;
use DDD\Infrastructure\User\Providers\UserServiceProvider;
use DDD\Package\Providers\PackageServiceProvider;
use Illuminate\Support\ServiceProvider;

class DDDServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPackage();
        $this->registerUtils();
        $this->registerDDDServiceProvider();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    protected function registerPackage()
    {
        $this->app->register(PackageServiceProvider::class);
    }

    protected function registerDDDServiceProvider()
    {
        $this->app->register(KafkaServiceProvider::class);
        $this->app->register(CoreServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
        $this->app->register(ApiServiceProvider::class);
    }

    protected function registerUtils()
    {
        if (file_exists($file = app()->basePath('utils/helpers.php'))) {
            require $file;
        }
    }
}
