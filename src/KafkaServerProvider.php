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


        $this->app->singleton(RdKafka::class, function ($app) {
            $conf = new Conf();

            $config = $app['config']->get('kafka');

            $options = $config['options'] ?? [];

            if ($config['tls']) {
                $options = array_merge($options, $config['tls_options']);
            }

            foreach ($options as $option => $value) {
                $conf->set($option, $value);
            }
            return new Producer($conf);
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/kafka.php', 'kafka');

        $this->publishes([
            __DIR__ . '/../config/kafka.php' => config_path('kafka.php')
        ], 'kafka');
    }
}
