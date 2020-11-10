<?php

return [
    // Brokers address
    'brokers' => array_filter(explode(',',env('KAFKA_BROKERS', ''))),
    'options' => [
        'log_level' => LOG_DEBUG,
        'debug' => 'all',
        'security.protocol' => 'ssl',
        'ssl.truststore.type' => 'JKS',
        'ssl.truststore.location' => env('KAFKA_SSL_TRUSTSTORE_LOCATION'),
        'ssl.truststore.password' => env('KAFKA_SSL_TRUSTSTORE_PASSWORD'),
        'ssl.keystore.location' => env('KAFKA_SSL_KEYSTORE_LOCATION'),
        'ssl.keystore.password' => env('KAFKA_SSL_KEYSTORE_PASSWORD')
    ]
];
