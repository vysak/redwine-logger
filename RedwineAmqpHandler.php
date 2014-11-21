<?php
require 'vendor/autoload.php';
require_once 'RabbitMQExchangeFactory.php';

use Monolog\Handler\AmqpHandler;
use Monolog\Logger;

class RedwineAmqpHandler extends AmqpHandler{

    public function __construct(){
        $factory = new RabbitMQExchangeFactory();
        parent::__construct($factory->getAMQPExchange(), $factory->getExchangeName(), Logger::INFO);
    }

	/*public function __construct($exchange, $exchangeName = 'log', $level = Logger::DEBUG, $bubble = true)
    {
        parent::__construct($exchange, $exchangeName,$level,$bubble);
    }
*/
	//Override write function to use a specific routing key
	/*protected function write(array $record)
    {
        $data = $record["formatted"];

        $routingKey = $record['channel'];

        if ($this->exchange instanceof AMQPExchange) {
            $this->exchange->publish(
                $data,
                strtolower($routingKey),
                0,
                array(
                    'delivery_mode' => 2,
                    'Content-type' => 'application/json'
                )
            );
        } else {
            $this->exchange->basic_publish(
                new AMQPMessage(
                    (string) $data,
                    array(
                        'delivery_mode' => 2,
                        'content_type' => 'application/json'
                    )
                ),
                $this->exchangeName,
                strtolower($routingKey)
            );
        }
    }*/
}