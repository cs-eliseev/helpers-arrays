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

// Example: pull key
// value1
var_dump(Arrays::pullKey($array, 'key1'));
var_dump($array);
// default1
var_dump(Arrays::pullKey($array, 'key4', 'default1'));
var_dump($array);
echo PHP_EOL;

// Example: object to array
// ['key1' => 'value1', 'key2' => 'value2']
$object = new \stdClass();
$object->key1 = 'value1';
$object->key2 = 'value2';
var_dump(Arrays::objectToArray($object));
echo PHP_EOL;

// Example: to tag
// <tag1 attr1="1" attr2="2">1</tag1><tag2>2</tag2><tag3 />
var_dump(Arrays::toTags([
    'tag1' => [
        1,
        'attr1' => 1,
        'attr2' => 2
    ],
    'tag2' => 2,
    'tag3'
]));

$array = [
    [
        'keyGroup1' => 'value1',
        'keyGroup2' => 'value2',
        'keyGroup3' => 'value3'
    ], [
        'keyGroup2' => 'value2',
        'keyGroup3' => 'value3'
    ], [
        'keyGroup1' => 'value1',
        'keyGroup3' => 'value2'
    ]
];

// Example: map
// ['value1' => ['keyGroup1' => 'value1', 'keyGroup3' => 'value2']]
var_dump(Arrays::map($array, 'keyGroup1'));
// ['value1' => ['keyGroup2' => 'value2', 'keyGroup3' => 'value3']]
var_dump(Arrays::map($array, 'keyGroup2'));
// ['value3' => NULL, 'value2' => 'value3']
var_dump(Arrays::map($array, 'keyGroup3', 'keyGroup1'));
