<?php

namespace Septech\Kafka;

use RdKafka;
use Septech\Kafka\Exceptions\FlushingException;

/**
 * @mixin RdKafka
 */
class Kafka
{
    /**
     * @var RdKafka
     */
    protected $kafka;

    public function __construct(RdKafka $kafka, array $brokers = [])
    {
        $this->kafka = $kafka;

        $this->addBroker($brokers);
    }

    public function topic(string $name)
    {
        return $this->kafka->newTopic($name);
    }

    public function addBroker(array $brokers)
    {
        $this->kafka->addBrokers(implode(',', $brokers));

        return $this;
    }

    /**
     * @param string $topic
     * @param $payload
     * @param int $timeout_ms
     * @return mixed
     * @throws FlushingException
     */
    public function produce(string $topic, $payload, $timeout_ms = 10000)
    {
        $this->topic($topic)->produce(RD_KAFKA_PARTITION_UA, 0, $payload);

        $result = $this->kafka->flush($timeout_ms);

        if ($result != RD_KAFKA_RESP_ERR_NO_ERROR) {
            throw new FlushingException(
                "An error occur while flushing messages to kafka. Messages might be lost"
            );
        }

        return $result;
    }

    public function __call($method, $arguments)
    {
        $this->kafka->$method(...$arguments);
    }
}