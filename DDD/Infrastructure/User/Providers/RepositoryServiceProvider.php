<?php

namespace DDD\Infrastructure\User\Providers;

use Illuminate\Support\ServiceProvider;
use DDD\Domain\Aggregates\User\Repositories as Interfaces;
use DDD\Infrastructure\User\Repositories;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        Interfaces\Interfaces::class => Repositories\UserRepository::class,
    ];
}
