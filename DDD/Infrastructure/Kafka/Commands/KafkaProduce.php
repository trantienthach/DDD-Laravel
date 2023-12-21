<?php

namespace DDD\Infrastructure\Kafka\Commands;

use DDD\Infrastructure\Kafka\Jobs\KafkaProduceJob;
use Illuminate\Console\Command;

class KafkaProduce extends Command
{
    protected $signature = 'kafka:produce';

    public function handle()
    {
        $data = [];

        KafkaProduceJob::dispatch($data);
    }
}
