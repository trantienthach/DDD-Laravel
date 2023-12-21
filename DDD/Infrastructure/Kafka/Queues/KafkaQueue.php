<?php

namespace DDD\Infrastructure\Kafka\Queues;

use DDD\Infrastructure\Kafka\Constants\KafkaConstant;
use Illuminate\Queue\Queue;
use Illuminate\Contracts\Queue\Queue as QueueContract;

class KafkaQueue extends Queue implements QueueContract
{
    protected $producer;
    protected $consumer;

    public function __construct($producer, $consumer)
    {
        $this->producer = $producer;
        $this->consumer = $consumer;
    }

    public function size($queue = null)
    {

    }

    public function push($job, $data = '', $queue = null)
    {
        /**
         * Starts by creating a new kafka topic producer
         * It specifies that it will produce messages to the 'default' topic.
         */
        $topic = $this->producer->newTopic('default');

        $topic->produce(KafkaConstant::RD_KAFKA_PARTITION_UA, 0, serialize($job));

        /**
         * After producing the message, the code flushes the producer buffer.
         * This step is crucial because Kafka producers typically buffer messages before sending them to Kafka to improve efficiency.
         * The flush method is used to ensure that any buffered messages are sent to Kafka within a specified time frame.
         * In this case, the timeout is set to 1000 milliseconds (1 second).
         */
        $this->producer->flush(1000);
    }

    public function pushRaw($payload, $queue = null, array $options = [])
    {

    }

    public function later($delay, $job, $data = '', $queue = null)
    {

    }

    public function pop($queue = null)
    {
        /**
         * Subscribe a kafka topic.
         */
        $this->consumer->subscribe(['default']);

        /**
         * This line used to consume a message from the kafka topic.
         * it has a timeout of 120 seconds (120 * 1000 milliseconds)
         * which means it will wait for up to 120 seconds, and if no message arrives during hat time, it will return.
         */
        $message = $this->consumer->consume(120 * 1000);

        switch ($message->err) {
            case KafkaConstant::RD_KAFKA_RESP_ERR_NO_ERROR:
                $job = unserialize($message->payload);
                $job->handle();
                break;
            case KafkaConstant::RD_KAFKA_RESP_ERR__PARTITION_EOF:
                echo "No more message; will wait for more\n";
                break;
            case KafkaConstant::RD_KAFKA_RESP_ERR__TIMED_OUT:
                echo "Time out\n";
                break;
            default:
                throw new \Exception($message->errStr(), $message->err);
                break;
        }
    }
}
