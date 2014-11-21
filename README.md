Redwine Logger
==============
Redwine Logger is mainly created for logging Redwine service.

  - RedwineLogger by deafult logs to RabbitMQ 
  - So its mandatory to setup your rabbitmq before using 
  - Please be sure to setup the RabbitMQ exchanges, queues and bindings as per the config.

### Version
1.1

### Dependency

This version of logger has dependancy on the following :

* AMQP Extension - 1.4.0
* Rabbitmq-c - 0.5.2
* PHP - 5.3 or 5.4 , Not tested with other version
* RabbitMQ - 3.4.1

### Installation 
Note: Please install RabbitMQ as per the rabbitmq website says 

Download and install rabbitmq-c
```sh
$ wget https://github.com/alanxz/rabbitmq-c/releases/download/v0.5.2/rabbitmq-c-0.5.2.tar.gz
$ tar -xzvf rabbitmq-c-0.5.2.tar.gz
$ cd rabbitmq-c-0.5.2
$ autoreconf -i
$ ./configure
$ make
$ sudo make install
```
If you getting an error like while ./configure
```
checking for gcc option to accept ISO C99... -std=gnu99
./configure: line 11905: syntax error near unexpected token `0.17'
./configure: line 11905: `PKG_PROG_PKG_CONFIG(0.17)'
```
Then do:
```sh
$ sudo apt-get install pkg-config
```

Now install amqp php extension using pecl
```sh
$ sudo pecl install amqp
```
### Usage

Example.php explain how to use it:
```php
require_once 'RedwineLogger.php';
$logger = new RedwineLogger();
$logger->info('{log:"this is a sample logging", log_type: "info"}');
$logger->info('{log:"this is a sample logging", log_type: "warn"}');
$logger->error('{log:"this is a sample logging", log_type: "log"}');
```
The package includes a sample logstash configuration(`logstash.config`) for connecting rabbitmq with elasticsearch clusters.
