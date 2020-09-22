<?php

return [
    // Brokers address
    'brokers' => array_filter(explode(',',env('KAFKA_BROKERS', ''))),
];
