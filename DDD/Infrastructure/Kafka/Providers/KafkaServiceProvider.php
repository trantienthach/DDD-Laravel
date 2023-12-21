<?php

namespace DDD\Infrastructure\Kafka\Providers;

use DDD\Application\IntegrationClients\KafkaClient;
use DDD\Infrastructure\Kafka\Commands\KafkaConsumer;
use DDD\Infrastructure\Kafka\Commands\KafkaProduce;
use DDD\Infrastructure\Kafka\Connectors\KafkaConnector;
use DDD\Infrastructure\Kafka\Services\KafkaService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\QueueManager;

class KafkaServiceProvider extends ServiceProvider
{
    protected $layer = 'I';

    public function register()
    {
        $this->mergeConfig();

        // $this->app->singleton(KafkaService::class, function($app) {
        //     return new KafkaService(config('queue.connections.kafka'));
        // });

        // $this->app->singleton(KafkaClient::class, function($app) {
        //     return $app->make(KafkaService::class)->client();
        // });
    }

    public function boot()
    {
        $this->bootConfig();
        $this->bootCommands();

        /** @var QueueManager */
        $queueManager = $this->app['queue'];

        $queueManager->addConnector('kafka', function() {
            return new KafkaConnector;
        });
    }

    public function configName()
    {
        return 'ddd_kafka';
    }

    public function mergeConfig()
    {
        $this->mergeConfigFrom(ddd_path($this->layer, 'Kafka/Config/config.php'), $this->configName());
    }

    public function bootConfig()
    {
        $this->publishes([ ddd_path($this->layer, 'Kafka/Config/config.php') => config_path($this->configName().'.php') ], 'config');
    }

    public function bootCommands()
    {
        return $this->commands([
            KafkaConsumer::class,
            KafkaProduce::class,
        ]);
    }
}
