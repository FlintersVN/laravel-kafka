
## Installation

```shell script
composer require septech-laravel/kafka 
```

## Usage

### Environment variables
```
# The kafka brokers, seperate by command
KAFKA_BROKERS=10.0.0.2,127.0.0.1
KAFKA_SSL_CA_LOCATION=./ca.crt

# For SSL client
SECURITY_PROTOCOL=ssl
KAFKA_SSL_CERTIFICATE_LOCATION=./user.crt
KAFKA_SSL_KEY_LOCATION=./user.key
KAFKA_SSL_KEY_PASSWORD=SOME_PASSWORD
```

### Via injection

```php
<?php

use Septech\Kafka\Kafka;

class MessageController
{
    public function send(Kafka $kafka)
    {
        $message = json_encode(['message' => 'Hi, from kafka with love <3']);
        $kafka->produce("some.topic", $message);
    }
}

```

### Via Facade

```php
<?php

use Septech\Kafka\Facades\Kafka;

$message = json_encode(['message' => 'Hi, from kafka with love <3']);
Kafka::produce("some.topic", $message);
```

## Look like package is missing something?

Well, nothing this absolutely perfect at first time.
I just create this package for my purpose. If you want more features for this package.
It needs you. Feel free send me a PR.
