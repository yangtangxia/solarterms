<?php
$files = glob('../Config/*.php');
var_dump($files);
foreach ($files as $file) {
    require_once $file;
}
