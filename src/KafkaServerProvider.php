<?php

namespace Septech\Kafka;

use RdKafka;
use RdKafka\Conf;
use RdKafka\Producer;
use Illuminate\Support\ServiceProvider;

class KafkaServerProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Kafka::class, function ($app) {
            $config = $app['config']->get('kafka');

            return new Kafka(
                $app->make(RdKafka::class),
                $brokers = $config['brokers'] ?? []
            );
        });


        $this->app->singleton(RdKafka::class, function () {
            $conf = new Conf();
            $conf->set('log_level', (string) LOG_DEBUG);
            $conf->set('debug', 'all');
            return new Producer($conf);
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/kafka.php', 'kafka');

        $this->publishes([
            __DIR__ . '/../config/kafka.php' => config_path('kafka.php')
        ], 'kafka');
    }
}