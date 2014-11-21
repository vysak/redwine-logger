<?php
require_once 'RabbitMQConfiguration.php';

class RabbitMQExchangeFactory{
	private $connection;

	public function __construct(){
		$this->connection = new AMQPConnection();
		$this->connection->setLogin(RabbitMQConfiguration::USER);
		$this->connection->setPassword(RabbitMQConfiguration::PASSWORD);
		$this->connection->setHost(RabbitMQConfiguration::HOST);
		$this->connection->setVhost(RabbitMQConfiguration::VHOST);
		$this->connection->connect();
	}

	public function getAMQPExchange(){
		$ch = new AMQPChannel($this->connection);
		$ex = new AMQPExchange($ch);
		$ex->setName(RabbitMQConfiguration::EXCHANGE_NAME);
		return $ex;
	}

	public function getExchangeName (){
		return RabbitMQConfiguration::EXCHANGE_NAME;
	}

	public function disconnect(){
		$this->connection->disconnect();
	}

	//Utility functions for creating exchange and queue on the connected rabbitmq server
	public function createExchange($name, $type = AMQP_EX_TYPE_DIRECT, $flags =  AMQP_DURABLE){
		$ch = new AMQPChannel($this->connection);
		$ex = new AMQPExchange($ch);
		$ex->setName($name);
		$ex->setType($type);
		$ex->setFlags($flags);
		$ex->declare();
		return $ex;
	}

	public function createQueue($name,$flage = AMQP_DURABLE ){
		$ch = new AMQPChannel($this->connection);
		$q = new AMQPQueue($ch);
		$q->setName($name);
		$q->setFlags($flage);
		$q->declare();
		return $q;
	}

	public function bindQueueWithExchange(AMQPQueue $q, AMQPExchange $ex, $key){
		$q->bind($ex->getName(), $key);
	}

}
