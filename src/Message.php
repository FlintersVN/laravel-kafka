<?php

namespace Septech\Kafka;

abstract class Message
{
    public function __toString()
    {
        return $this->toJson();
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}