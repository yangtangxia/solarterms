<?php
require 'vendor/autoload.php';

use LongchengjqSdk\Client;

$key = '1111';
$secret  = '22222';

try {
    $client = new Client($key, $secret);

    var_dump($client);
} catch (\Exception $e) {

    var_dump($e->getMessage());
}
