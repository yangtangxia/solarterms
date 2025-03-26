<?php

namespace LongchengjqSdk\test;

require_once '../Config/Solar.php';
require_once '../Config/Lunar.php';
require_once '../Config/LunarYear.php';


use LongchengjqSdk\Config\Solar;
use LongchengjqSdk\Config\Lunar;
use LongchengjqSdk\Config\LunarYear;
use DateTime;

var_dump('test soalr-term start');

$current_date = date('Y-m-d H:i:s');
$current_date = '2025-02-03 23:00:00';
// $solar = Solar::fromDate($current_date);

$solar = Solar::fromDate($current_date);



// var_dump($solar);
// die;
// 获取星座
// $xinzuo = $solar->getXingZuo();
// var_dump($xinzuo);
// die;
// 获取节气信息

// var_dump(1111);
// die;
// 阳历转阴历
$lunar = $solar->getLunar();

// echo $lunar . "\n";
// echo $lunar->getYearInGanZhiByLiChun() . "\n";
// echo $lunar->toString() . "\n";
// echo $lunar->toFullString() . "\n";

// 以立春为界
$eightChar = $lunar->getEightChar();
// var_dump($eightChar->getYear());



$jieqi = $lunar->getSolar();
// var_dump($jieqi);
// die;

// $d = Lunar::fromDate(new DateTime());

$d = Lunar::fromYmd(2025, 2, 3);

// var_dump($d);
// echo $d . "\n";
// var_dump($d->getJie());


// var_dump(date('Y-m-d H:i:s'));

// 根据日期获取节气
$solar = Solar::fromYmdHms(date('Y'), date('m'), date('d'), date('H'), date('i'), date('s'));
$lunar = $solar->getLunar();
// 获取所有节气信息
$solar_term_list = $lunar->getJieQiTable();
$solar_term_array = array_map(function ($key, $solar) {
    return [
        'name' => $key,          // 添加节气名称
        'year' => $solar->getYear(),
        'month' => $solar->getMonth(),
        'day' => $solar->getDay(),
        'hour' => $solar->getHour(),
        'minute' => $solar->getMinute(),
        'second' => $solar->getSecond(),
        'date' => $solar->toYmdHms(),  // 原有日期字符串
    ];
}, array_keys($solar_term_list), $solar_term_list);
// 获取当前节气名称
$current_date = date('Y-m-d H:i:s');
// $current_date = '2025-01-23 23:00:00';
$current_solar_term = '';
foreach ($solar_term_array as $key => $value) {
    if ($current_date > $value['date'] && $current_date < $solar_term_array[$key + 1]['date']) {
        $current_solar_term = $value['name'];
        break;
    }
}
// 当前节气名称
var_dump($current_solar_term);

// die;

// $lunarYear = 2025;
// $y = LunarYear::fromYear($lunarYear);
// // var_dump($y->getJieQiJulianDays());

// $res = Solar::fromJulianDay(2460725.2543793283);
// var_dump($res);

// $result[Lunar::$JIE_QI_IN_USE[5]] = $res;
// var_dump($result);
