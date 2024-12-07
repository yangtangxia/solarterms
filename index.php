<?php
require 'vendor/autoload.php';
use LongchengjqSdk\HelloWorld;

$login = new HelloWorld();



$res = $login->sayHello();
var_dump($res);