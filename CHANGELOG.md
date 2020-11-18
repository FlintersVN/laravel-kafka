# Release Notes

## [Unreleased](https://github.com/SepteniTechnology/laravel-kafka/compare/v1.0.4...master)

## [v1.0.4 - 2020-11-18](https://github.com/SepteniTechnology/laravel-kafka/compare/v1.0.1...v1.0.4)

### Changed
- Add `SECURITY_PROTOCOL` to environment variable instead of hard fixed

## [v1.0.3 - 2020-11-10](https://github.com/SepteniTechnology/laravel-kafka/compare/v1.0.1...v1.0.3)

### Changed
- Using config from env variables for SSL connection (Kafka SSL client)
```
KAFKA_SSL_CA_LOCATION=./ca.crt

# For SSL client
KAFKA_SSL_CERTIFICATE_LOCATION=./user.crt [./user.pem]
KAFKA_SSL_KEY_LOCATION=./user.key
KAFKA_SSL_KEY_PASSWORD=SOME_PASSWORD
```
For more information [Using SSL with librdkafka](https://github.com/edenhill/librdkafka/wiki/Using-SSL-with-librdkafka)

## [v1.0.1 - 2020-09-22](https://github.com/SepteniTechnology/laravel-kafka/compare/v1.0.0...v1.0.1)

### Changed
- Using config from env variables for declare Kafka brokers
```
KAFKA_BROKERS
```

## [v1.0.0 - 2020-09-19](https://github.com/SepteniTechnology/laravel-kafka/tree/v1.0.0)
### Added
- First launch 🚀🚀🚀
