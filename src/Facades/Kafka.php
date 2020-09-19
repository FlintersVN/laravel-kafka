<?php

namespace Septech\Kafka\Facades;

use RdKafka\Topic;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Topic topic(string $name)
 * @method static \Septech\Kafka\Kafka addBroker(array $brokers)
 * @method static int produce(string $name, mixed $payload, $timeout_ms = 10000)
 */
class Kafka extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Septech\Kafka\Kafka::class;
    }
}