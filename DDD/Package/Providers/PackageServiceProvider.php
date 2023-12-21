<?php

namespace DDD\Package\Providers;

use DDD\Package\Commands;
use DDD\Package\Interfaces\PackageRepositoryInterface;
use DDD\Package\Providers\Base\BasePackageServiceProvider;
use DDD\Package\Repositories\FileRepository;

class PackageServiceProvider extends BasePackageServiceProvider
{
    public function register()
    {
        $this->registerServices();

        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'package');

        $this->test();
    }

    public function boot()
    {
        // $this->registerNamespaces();
        // $this->registerPackage();

        $this->bootCommands();
    }

    protected function registerServices()
    {
        $this->app->singleton(PackageRepositoryInterface::class, function($app) {
            $path = $app['config']->get('package.paths.packages');

            return new FileRepository($app, $path);
        });

        $this->app->alias(PackageRepositoryInterface::class, 'package');
    }

    protected function test()
    {
        // app(PackageRepositoryInterface::class);
        // dd(
        //     app('package')
        // );
    }

    protected function bootCommands()
    {
        return $this->commands([
            Commands\MigrateCommand::class,
            Commands\MigrationMakeCommand::class
        ]);
    }
}
