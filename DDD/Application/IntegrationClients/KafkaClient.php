<?php

namespace DDD\Application\IntegrationClients;

use Illuminate\Contracts\Container\BindingResolutionException;

class KafkaClient
{
    /**
     * @return \RdKafka\Conf
     * @throws BindingResolutionException
     */
    public static function make()
    {
        return app(static::class);
    }
}
