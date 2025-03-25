<?php

namespace LongchengjqSdk\test;

require_once '../Solar.php';

use LongchengjqSdk\Solar;
// 获取节气信息

var_dump('test soalr-term start');

$current_date = date('Y-m-d H:i:s');
$solar = Solar::fromDate($current_date);

// 获取星座
$xinzuo = $solar->getXingZuo();
var_dump($xinzuo);

var_dump($solar->getLunar());
// 获取节气信息
