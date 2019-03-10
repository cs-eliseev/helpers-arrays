<?php

require_once __DIR__ . '/../autoload.php';

use cse\helpers\Arrays;

$array = [
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
];

// Example: get
// value1
var_dump(Arrays::get($array, 'key1'));
// default1
var_dump(Arrays::get($array, 'key4', 'default1'));
echo PHP_EOL;