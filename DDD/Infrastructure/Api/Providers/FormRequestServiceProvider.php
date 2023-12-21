<?php

namespace DDD\Infrastructure\Api\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use DDD\UI\FormRequests\Api;

class FormRequestServiceProvider extends ServiceProvider
{
    public $singletons = [
        Api\User\Auth\Interfaces\SignupRequestInterface::class => Api\User\Auth\SignupRequest::class,
        Api\User\Auth\Interfaces\SigninRequestInterface::class => Api\User\Auth\SigninRequest::class,
    ];
}
