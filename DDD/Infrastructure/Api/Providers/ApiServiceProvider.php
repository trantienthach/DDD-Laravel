<?php

namespace DDD\Infrastructure\Api\Providers;

use DDD\UI\FormRequests\Base\BaseApiFormRequest;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(FormRequestServiceProvider::class);
    }

    public function boot()
    {
        $this->bootMiddleware();
        $this->bootApiFormRequest();
    }

    protected function bootMiddleware()
    {
        /** @var Router */
        $router = $this->app['router'];

        $router->middlewareGroup('ddd.user_api', ['throttle:user_api', 'ddd.core.xss_prevention', 'ddd.core.platform']);
    }

    protected function bootApiFormRequest()
    {
        $this->app->resolving(BaseApiFormRequest::class, function($form, $app) {
            $form = BaseApiFormRequest::createFrom($app['request'], $form);
            $form->setContainer($app);
        });

        $this->app->afterResolving(BaseApiFormRequest::class, function(BaseApiFormRequest $form) {
            $form->validate();
        });
    }
}
