<?php

namespace DDD\Infrastructure\User\Providers;

use Illuminate\Support\ServiceProvider;
use DDD\Domain\Aggregates\User\Repositories as Interfaces;
use DDD\Domain\Aggregates\User\Repositories\UserRepositoryInterface;
use DDD\Infrastructure\User\Repositories;
use DDD\Infrastructure\User\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        UserRepositoryInterface::class => UserRepository::class,
    ];
}
