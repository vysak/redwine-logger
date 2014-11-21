<?php

require 'vendor/autoload.php';
require_once 'RabbitMQExchangeFactory.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\AmqpHandler;
use Monolog\Formatter\ElasticaFormatter;
use Monolog\Formatter\JsonFormatter;

/*
	RedwineLogger uses the name of logger and the type of log as the routing key.
	For example:
		If you logged using log.error() routing key for rabbitmq will be erro.redwine, where redwine is the logger name;
		If You logged using log.info(), routing key will be info.redwine.
*/
		
class RedwineLogger{
	protected $log;
	protected $amqp;

	public function __construct(){
		$this->log = new Logger('redwine');
		$factory = new RabbitMQExchangeFactory();
		$handler = new AmqpHandler($factory->getAMQPExchange(), $factory->getExchangeName(), Logger::INFO);
		$this->log->pushHandler($handler);
	}
	
	public function info($data){
		$this->log->info($data);
	}

	public function error($data){
		$this->log->error($data);
	}
}
