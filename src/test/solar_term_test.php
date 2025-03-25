<?php

namespace LongchengjqSdk\test;

require_once '../Solar.php';

use LongchengjqSdk\Solar;
// 获取节气信息

var_dump('test soalr-term start');

$current_date = date('Y-m-d H:i:s');
$date = Solar::fromDate($current_date);
var_dump($date);

$julianday = $date->getJulianDay();

var_dump($julianday);

$fromJulianDay = Solar::fromJulianDay($julianday);
var_dump($fromJulianDay);
