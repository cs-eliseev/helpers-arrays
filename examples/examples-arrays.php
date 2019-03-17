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
echo PHP_EOL;

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
// ['value2' => ['keyGroup2' => 'value2', 'keyGroup3' => 'value3']]
var_dump(Arrays::map($array, 'keyGroup2'));
// ['value3' => NULL, 'value2' => 'value1']
var_dump(Arrays::map($array, 'keyGroup3', 'keyGroup1'));
echo PHP_EOL;

// Example: group
// ['value1' => [['keyGroup1' => 'value1', 'keyGroup2' => 'value2', 'keyGroup3' => 'value3'], ['keyGroup1' => 'value1', 'keyGroup3' => 'value2']]]
var_dump(Arrays::group($array, 'keyGroup1'));
// ['value1' => [['keyGroup1' => 'value1', 'keyGroup2' => 'value2', 'keyGroup3' => 'value3'], ['keyGroup2' => 'value2', 'keyGroup3' => 'value3']]]
var_dump(Arrays::group($array, 'keyGroup2'));
// ['value3' => [['value1', NULL]], 'value2' => ['value1']]
var_dump(Arrays::group($array, 'keyGroup3', 'keyGroup1'));
echo PHP_EOL;

// Example: index
// ['value1' => [['keyGroup1' => 'value1', 'keyGroup2' => 'value2', 'keyGroup3' => 'value3'], ['keyGroup1' => 'value1', 'keyGroup3' => 'value2']]]
var_dump(Arrays::index($array, 'keyGroup1'));
// ['value1' => [['keyGroup1' => 'value1', 'keyGroup2' => 'value2', 'keyGroup3' => 'value3'], ['keyGroup2' => 'value2', 'keyGroup3' => 'value3']]]
var_dump(Arrays::index($array, 'keyGroup2'));
// ['value3' => [['value1', NULL]], 'value2' => ['value1']]
var_dump(Arrays::index($array, 'keyGroup3', 'keyGroup1'));
echo PHP_EOL;

$array = [
    [
        [],
        []
    ],
    [
        [],
        [1 => 'second1', 2 => 'second2']
    ],
    [
        [1 => 'first1', 2 => 'first2'],
        []
    ],
    [
        [1 => 'first1', 2 => 'first2'],
        [1 => 'second1', 2 => 'second2']
    ],
    [
        [1 => 'first1', 2 => 'first2'],
        [3 => 'second3']
    ],
    [
        [1 => 'first1', 2 => '', 3 => '0', 4 => null, 5 => 'first5', 6 => 'first6', 7 => 'first7', 8 => [], 9 => 'first9', 11 => 'first11'],
        [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => '', 6 => '0', 7 => null, 8 => 'second8', 9 => [], 10 => 'second10', 12 => 0]
    ],
];

// Example: append not empty data
// [1 => 'first1', 2 => '', 3 => '0', 4 => null, 5 => 'first5', 6 => 'first6', 7 => 'first7', 8 => [], 9 => 'first9', 11 => 'first11', 10 => 'second10']
foreach ($array as $item) {
    var_dump(Arrays::appendNotEmptyData($item[0], $item[1]));
}
echo PHP_EOL;

// Example: replace empty not empty data
// [1 => 'first1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => 'first5', 6 => 'first6', 7 => 'first7', 8 => 'second8', 9 => 'first9', 11 => 'first11']
foreach ($array as $item) {
    var_dump(Arrays::replaceEmptyNotEmptyData($item[0], $item[1]));
}
echo PHP_EOL;

// Example: replace not empty data
// [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => 'first5', 6 => 'first6', 7 => 'first7', 8 => 'second8', 9 => 'first9', 11 => 'first11']
foreach ($array as $item) {
    var_dump(Arrays::replaceNotEmptyData($item[0], $item[1]));
}
echo PHP_EOL;

// Example: merge not empty data
// [1 => 'second1', 2 => 'second2', 3 => 'second3', 4 => 'second4', 5 => 'first5', 6 => 'first6', 7 => 'first7', 8 => 'second8', 9 => 'first9', 11 => 'first11', 10 => 'second10']
foreach ($array as $item) {
    var_dump(Arrays::mergeNotEmptyData($item[0], $item[1]));
}
echo PHP_EOL;

$array = [
    [
        [],
        true
    ],
    [
        [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
        false
    ],
    [
        [' first 1 ', 'key1' => false, '', '0', 'key4' => null, [' first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4 '], true, [], 'key8' => 'first 2 '],
        true
    ],
];

// Example: empty to null
// [0 => ' first 1 ', 'key1' => null, 1 => null, 2 => null, 'key4' => null, 3 => [0 => ' first 3', 1 => null, 'key2' => null, 2 => null, 'key5' => null, 'key6' => 12, 3 => null, 4 => 'first 4 '], 4 => true, 5 => null, 'key8' => 'first 2 ']
foreach ($array as $item) {
    var_dump(Arrays::emptyToNull($item[0], $item[1]));
}
echo PHP_EOL;

// Example: remove empty
// [0 => ' first 1 ', 3 => [0 => ' first 3', 'key6' => 12, 4 => 'first 4 '], 4 => true, 'key8' => 'first 2 ']
foreach ($array as $item) {
    var_dump(Arrays::removeEmpty($item[0], $item[1]));
}
echo PHP_EOL;

// Example: remove null
// [0 => ' first 1 ', 'key1' => false, 1 => '', 2 => '0', 3 => [0 => ' first 3', 1 => false, 'key2' => '', 2 => '0', 'key6' => 12, 3 => [], 4 => 'first 4 '], 4 => true, 5 => [], 'key8' => 'first 2 ']
foreach ($array as $item) {
    var_dump(Arrays::removeNull($item[0], $item[1]));
}
echo PHP_EOL;

// Example: trim
// ['first 1', 'key1' => false, '', '0', 'key4' => null, ['first 3', false, 'key2' => '', '0', 'key5' => null, 'key6' => 12, [], 'first 4'], true, [], 'key8' => 'first 2']
foreach ($array as $item) {
    var_dump(Arrays::trim($item[0], $item[1]));
}
echo PHP_EOL;