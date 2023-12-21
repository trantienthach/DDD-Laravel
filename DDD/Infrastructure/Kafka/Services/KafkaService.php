<?php

namespace DDD\Infrastructure\Kafka\Services;

use Illuminate\Contracts\Container\BindingResolutionException;

class KafkaService
{
    private $config;

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * @return $this
     * @throws BindingResolutionException
     */
    public static function make()
    {
        return app(static::class);
    }

    public function client()
    {
        $conf = new \RdKafka\Conf();

        $conf->set('bootstrap.servers', data_get($this->config, 'bootstrap_servers'));
        $conf->set('security.protocol', data_get($this->config, 'security_protocol'));
        $conf->set('sasl.mechanism', data_get($this->config, 'sasl_mechanism'));
        $conf->set('sasl.username', data_get($this->config, 'sasl_username'));
        $conf->set('sasl.password', data_get($this->config, 'sasl_password'));
        $conf->set('group.id', data_get($this->config, 'group_id'));
        $conf->set('auto.offset.reset', data_get($this->config, 'auto_offset_reset'));

        $consumer = new \RdKafka\KafkaConsumer($conf);

        return $consumer;
    }
}
