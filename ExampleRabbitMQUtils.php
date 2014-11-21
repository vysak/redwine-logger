<?php
/*
	This examples will show you how you can create rabbit MQ exchanegs and queues and binding them.
*/
require_once 'RabbitMQExchangeFactory.php';

$var = "foo";
$factory = new RabbitMQExchangeFactory();
$ex= $factory->createExchange("redwine.log" );
$q1 = $factory->createQueue("info.redwine" );
$q2 = $factory->createQueue("error.redwine" );

$factory->bindQueueWithExchange($q1,$ex,"info.redwine");
$factory->bindQueueWithExchange($q1,$ex,"erro.redwine");
$factory->disconnect();

?>