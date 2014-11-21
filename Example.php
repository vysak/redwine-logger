<?php
/*
    This is an Example which shows how to use the RedwineLogger in your application.
    Redwine Logger internally uses AMQP for posting logs to the AMQP compatible message broker.
    You can use this logger as follows.
*/

require_once 'RedwineLogger.php';

$logger = new RedwineLogger();
$logger->info('{
    "accept" : "String",
    "Accept-Encoding " : "String",
    "Cache-Control " : "String",
    "Content-Type " : "String",
    "Cookie" : "String",
    "Host" : "String",
    "User-Agent " : "String",
    "Device" : "String",
    "DeviceOS" : "String",
    "DeviceOSVer" : "Number",
    "shipping_method" : "String",
    "client_ip" : "Ip-address",
    "customer_session_id" : "String",
    "user_cart_key" : "String",
    "user_device_type" : "String",
    "payment_method" : "String",
    "payment_type " : "String",
    "payment_option" : "String",
    "card_num" : "String",
    "store_card_id" : "String",
    "customer_address" : "String",
    "customer_address_city" : "String",
    "customer_id" : "String",
    "customer_email" : "String",
    "order_ref" : "String",
    "order_value" : "Number",
    "payment_value" : "Number",
    "coupon_id" : "String",
    "coupon_value" : "Number",
    "jabong_credit" : "Number",
    "timestamp" : "UTC Format Time Stamp with ZONE",
    "log_source" : "String",
    "server_instance" : "String",
    "LOG_TYPE" : "type1"
}');

$logger->error('{
    "accept" : "String",
    "Accept-Encoding " : "String",
    "Cache-Control " : "String",
    "Content-Type " : "String",
    "Cookie" : "String",
    "Host" : "String",
    "User-Agent " : "String",
    "Device" : "String",
    "DeviceOS" : "String",
    "DeviceOSVer" : "Number",
    "shipping_method" : "String",
    "client_ip" : "Ip-address",
    "customer_session_id" : "String",
    "user_cart_key" : "String",
    "user_device_type" : "String",
    "payment_method" : "String",
    "payment_type " : "String",
    "payment_option" : "String",
    "card_num" : "String",
    "store_card_id" : "String",
    "customer_address" : "String",
    "customer_address_city" : "String",
    "customer_id" : "String",
    "customer_email" : "String",
    "order_ref" : "String",
    "order_value" : "Number",
    "payment_value" : "Number",
    "coupon_id" : "String",
    "coupon_value" : "Number",
    "jabong_credit" : "Number",
    "timestamp" : "UTC Format Time Stamp with ZONE",
    "log_source" : "String",
    "server_instance" : "String",
    "LOG_TYPE" : "type2"
}');

?>