<?php

namespace DDD\Infrastructure\Kafka\Commands;

use DDD\Application\IntegrationClients\KafkaClient;
use DDD\Infrastructure\Kafka\Constants\KafkaConstant;
use Illuminate\Console\Command;

class KafkaConsumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kafka consumer';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $kafkaConsumer = KafkaClient::make();

        while (true) {
            $kafkaConsumer->subscribe(['default']);

            $message = $kafkaConsumer->consume(120 * 1000);

            switch ($message->err) {
                case KafkaConstant::RD_KAFKA_RESP_ERR_NO_ERROR:
                    var_dump($message->payload);
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
}
