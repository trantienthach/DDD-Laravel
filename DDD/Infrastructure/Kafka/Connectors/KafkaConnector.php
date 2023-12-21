<?php

namespace DDD\Infrastructure\Kafka\Connectors;

use DDD\Infrastructure\Kafka\Queues\KafkaQueue;
use Illuminate\Queue\Connectors\ConnectorInterface;

class KafkaConnector implements ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param  array  $config
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
        $conf = new \RdKafka\Conf();

        $conf->set('bootstrap.servers', data_get($config, 'bootstrap_servers'));
        $conf->set('security.protocol', data_get($config, 'security_protocol'));
        $conf->set('sasl.mechanisms', data_get($config, 'sasl_mechanisms'));
        $conf->set('sasl.username', data_get($config, 'sasl_username'));
        $conf->set('sasl.password', data_get($config, 'sasl_password'));

        $producer = new \RdKafka\Producer($conf);

        $conf->set('group.id', data_get($config, 'group_id'));
        $conf->set('auto.offset.reset', data_get($config, 'auto_offset_reset'));

        $consumer = new \RdKafka\KafkaConsumer($conf);

        return new KafkaQueue($producer, $consumer);
    }
}
