English | [Русский](https://github.com/cs-eliseev/helpers-arrays/blob/master/README.ru_RU.md)

ARRAYS CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-arrays.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-arrays)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-arrays.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-arrays)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-arrays.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-arrays/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-arrays.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-arrays)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-arrays)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-arrays.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-arrays/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-arrays.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-arrays/archive/master.zip)

Array helpers provides extra static methods allowing you to deal with arrays more efficiently.

Project repository: https://github.com/cs-eliseev/helpers-arrays

**DEMO**
```php
$array = [
    0 => ' first 1 ',
    'key1' => false,
    1 => '',
    2 => '0',
    'key4' => null,
    3 => [
        0 => ' first 3',
        1 => false,
        'key2' => '',
        2 => '0',
        'key5' => null,
        'key6' => 12,
        3 => [],
        4 => 'first 4 '
    ],
    4 => true,
    5 => [],
    'key8' => 'first 2 '
];

$array = Arrays::trim(Arrays::removeNull(Arrays::removeEmpty($array), true), true);
/**
 * [
 *     0 => 'first 1',
 *     3 => [
 *         0 => 'first 3',
 *         1 => false,
 *         'key2' => '',
 *         2 => '0',
 *         'key6' => 12,
 *         3 => [],
 *         4 => 'first 4'
 *     ],
 *     4 => true,
 *     'key8' => 'first 2 '
 * ]
 */
$array2 = Arrays::pullKey($array, 3);
/**
 * $array = [
 *     0 => 'first 1',
 *     4 => true,
 *     'key8' => 'first 2 '
 * ]
 * $array2 = [
 *     0 => 'first 3',
 *     1 => false,
 *     'key2' => '',
 *     2 => '0',
 *     'key6' => 12,
 *     3 => [],
 *     4 => 'first 4'
 * ]
 */
$array = Arrays::mergeNotEmptyData($array, $array2);
/**
 * [
 *     0 => 'first 3',
 *     4 => 'first 4',
 *     'key8' => 'first 2',
 *     'key6' => 12
 * ]
 */
Arrays::get($array, 0);
// 'first 3'
```

***


## Introduction

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.md) is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. ARRAY CSE HELPERS provides extra static methods allowing you to deal with arrays more efficiently.

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.md) was created for the rapid development of web applications.

**CSE Helpers project:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Below you will find some information on how to init library and perform common commands.


## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-arrays).

### Composer

Execute the following command to get the latest version of the package:
```bash
composer require cse/helpers-arrays
```

Or file composer.json should include the following contents:
```json
{
    "require": {
        "cse/helpers-arrays": "*"
    }
}
```

### Git

Clone this repository locally:
```bash
git clone https://github.com/cs-eliseev/helpers-arrays.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-arrays/archive/master.zip).



## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-arrays.php](https://github.com/cs-eliseev/helpers-arrays/blob/master/examples/examples-arrays.php).

**GET array data by key**

Example:
```php
Arrays::get([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
], 'key1');
// value1
```

Set default value for not exist key:
```php
Arrays::get([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
], 'key4', 'default1');
// default1
```

**Pull array key**

Example:
```php
Arrays::pullKey([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
], 'key1');
// value1
/**
* [
*     'key2' => 'value2',
*     'key3' => 'value3'
* ]
*/
```

Set default value for not exist key:
```php
Arrays::pullKey([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
], 'key4', 'default1');
// default1
```

**Convert OBJECT TO ARRAY**

Example:
```php
$object = new \stdClass();
$object->key1 = 'value1';
$object->key2 = 'value2';
Arrays::objectToArray($object);
/**
* [
*     'key1' => 'value1',
*     'key2' => 'value2'
* ]
*/
```

**Convert array TO html TAG**

Example:
```php
Arrays::toTags([
    'tag1' => [
        1,
        'attr1' => 1,
        'attr2' => 2
    ],
    'tag2' => 2,
    'tag3'
]);
// <tag1 attr1="1" attr2="2">1</tag1><tag2>2</tag2><tag3 />
```

**Convert array to MAP**

Data:
```php
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
```

Example:
```php
Arrays::map($array, 'keyGroup1');
/**
* [
*     'value1' => [
*           'keyGroup1' => 'value1',
*           'keyGroup3' => 'value2'
*     ]
* ]
*/
```

Change key group:
```php
Arrays::map($array, 'keyGroup2');
/**
* [
*     'value2' => [
*           'keyGroup2' => 'value2',
*           'keyGroup3' => 'value3'
*     ]
* ]
*/
```

Set key value:
```php
Arrays::map($array, 'keyGroup3', 'keyGroup1');
/**
* [
*     'value3' => null,
*     'value2' => 'value1'
* ]
*/
```

**Array GROUP**

Data:
```php
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
```

Example:
```php
Arrays::group($array, 'keyGroup1');
/**
* [
*     'value1' => [
*         [
*             'keyGroup1' => 'value1',
*             'keyGroup2' => 'value2',
*             'keyGroup3' => 'value3'
*         ], [
*             'keyGroup1' => 'value1',
*             'keyGroup3' => 'value2'
*         ]
*     ]
* ]
*/
```

Change key group:
```php
Arrays::group($array, 'keyGroup2');
/**
* [
*     'value1' => [
*         [
*             'keyGroup1' => 'value1',
*             'keyGroup2' => 'value2',
*             'keyGroup3' => 'value3'
*         ], [
*             'keyGroup2' => 'value2',
*             'keyGroup3' => 'value3'
*         ]
*     ]
* ]
*/
```

Set key value:
```php
Arrays::group($array, 'keyGroup3', 'keyGroup1');
/**
* [
*     'value3' => [
*         [
*             'value1',
*             null
*         ]
*     ],
*     'value2' => [
*         [
*             'value1'
*         ]
*     ],
* ]
*/
```

**Array INDEX**

Data:
```php
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
```

Example:
```php
Arrays::index($array, 'keyGroup1');
/**
* [
*     'value1' => [
*         [
*             'keyGroup1' => 'value1',
*             'keyGroup2' => 'value2',
*             'keyGroup3' => 'value3'
*         ], [
*             'keyGroup1' => 'value1',
*             'keyGroup3' => 'value2'
*         ]
*     ]
* ]
*/
```

Change key group:
```php
Arrays::index($array, 'keyGroup2');
/**
* [
*     'value1' => [
*         [
*             'keyGroup1' => 'value1',
*             'keyGroup2' => 'value2',
*             'keyGroup3' => 'value3'
*         ], [
*             'keyGroup2' => 'value2',
*             'keyGroup3' => 'value3'
*         ]
*     ]
* ]
*/
```

Set key value:
```php
Arrays::index($array, 'keyGroup3', 'keyGroup1');
/**
* [
*     'value3' => [
*         [
*             'value1',
*             null
*         ]
*     ],
*     'value2' => [
*         [
*             'value1'
*         ]
*     ],
* ]
*/
```

**APPEND NOT EMPTY DATA**

Example:
```php
Arrays::appendNotEmptyData([
1 => 'first1',
    2 => '',
    3 => '0',
    4 => null,
    5 => 'first5',
    6 => 'first6',
    7 => 'first7',
    8 => [],
    9 => 'first9',
    11 => 'first11'
], [
    1 => 'second1',
    2 => 'second2',
    3 => 'second3',
    4 => 'second4',
    5 => '',
    6 => '0',
    7 => null,
    8 => 'second8',
    9 => [],
    10 => 'second10'
    12 => 0
]);
/**
* [
*     1 => 'first1',
*     2 => '',
*     3 => '0',
*     4 => null,
*     5 => 'first5',
*     6 => 'first6',
*     7 => 'first7',
*     8 => [],
*     9 => 'first9',
*     11 => 'first11',
*     10 => 'second10'
* ]
*/
```

**REPLACE EMPTY NOT EMPTY DATA**

Example:
```php
Arrays::replaceEmptyNotEmptyData([
1 => 'first1',
    2 => '',
    3 => '0',
    4 => null,
    5 => 'first5',
    6 => 'first6',
    7 => 'first7',
    8 => [],
    9 => 'first9',
    11 => 'first11'
], [
    1 => 'second1',
    2 => 'second2',
    3 => 'second3',
    4 => 'second4',
    5 => '',
    6 => '0',
    7 => null,
    8 => 'second8',
    9 => [],
    10 => 'second10'
    12 => 0
]);
/**
* [
*     1 => 'first1',
*     2 => 'second2',
*     3 => 'second3',
*     4 => 'second4',
*     5 => 'first5',
*     6 => 'first6',
*     7 => 'first7',
*     8 => 'second8',
*     9 => 'first9',
*     11 => 'first11'
* ]
*/
```

**REPLACE NOT EMPTY DATA**

Example:
```php
Arrays::replaceNotEmptyData([
1 => 'first1',
    2 => '',
    3 => '0',
    4 => null,
    5 => 'first5',
    6 => 'first6',
    7 => 'first7',
    8 => [],
    9 => 'first9',
    11 => 'first11'
], [
    1 => 'second1',
    2 => 'second2',
    3 => 'second3',
    4 => 'second4',
    5 => '',
    6 => '0',
    7 => null,
    8 => 'second8',
    9 => [],
    10 => 'second10'
    12 => 0
]);
/**
* [
*     1 => 'second1',
*     2 => 'second2',
*     3 => 'second3',
*     4 => 'second4',
*     5 => 'first5',
*     6 => 'first6',
*     7 => 'first7',
*     8 => 'second8',
*     9 => 'first9',
*     11 => 'first11'
* ]
*/
```

**MERGE NOT EMPTY DATA**

Example:
```php
Arrays::mergeNotEmptyData([
1 => 'first1',
    2 => '',
    3 => '0',
    4 => null,
    5 => 'first5',
    6 => 'first6',
    7 => 'first7',
    8 => [],
    9 => 'first9',
    11 => 'first11'
], [
    1 => 'second1',
    2 => 'second2',
    3 => 'second3',
    4 => 'second4',
    5 => '',
    6 => '0',
    7 => null,
    8 => 'second8',
    9 => [],
    10 => 'second10'
    12 => 0
]);
/**
* [
*     1 => 'second1',
*     2 => 'second2',
*     3 => 'second3',
*     4 => 'second4',
*     5 => 'first5',
*     6 => 'first6',
*     7 => 'first7',
*     8 => 'second8',
*     9 => 'first9',
*     11 => 'first11',
*     10 => 'second10'
* ]
*/
```

**Replace EMPTY array data TO NULL**

Data:
```php
$array = [
    0 => ' first 1 ', 
    'key1' => false, 
    1 => '', 
    2 => '0', 
    'key4' => null, 
    3 => [
        0 => ' first 3', 
        1 => false, 
        'key2' => '', 
        2 => '0', 
        'key5' => null, 
        'key6' => 12, 
        3 => [], 
        4 => 'first 4 '
    ], 
    4 => true, 
    5 => [], 
    'key8' => 'first 2 '
];
```

Example:
```php
Arrays::emptyToNull($array);
/**
* [
*     0 => ' first 1 ', 
*     'key1' => null, 
*     1 => null, 
*     2 => null, 
*     'key4' => null, 
*     3 => [
*         0 => ' first 3', 
*         1 => false, 
*         'key2' => '', 
*         2 => '0', 
*         'key5' => null, 
*         'key6' => 12, 
*         3 => [], 
*         4 => 'first 4 '
*     ], 
*     4 => true, 
*     5 => null, 
*     'key8' => 'first 2 '
* ]
*/
```

Recursive:
```php
Arrays::emptyToNull($array, true);
/**
* [
*     0 => ' first 1 ', 
*     'key1' => null, 
*     1 => null, 
*     2 => null, 
*     'key4' => null, 
*     3 => [
*         0 => ' first 3', 
*         1 => null, 
*         'key2' => null, 
*         2 => null, 
*         'key5' => null, 
*         'key6' => 12, 
*         3 => null, 
*         4 => 'first 4 '
*     ], 
*     4 => true, 
*     5 => null, 
*     'key8' => 'first 2 '
* ]
*/
```

**REMOVE EMPTY data to array**

Data:
```php
$array = [
    0 => ' first 1 ', 
    'key1' => false, 
    1 => '', 
    2 => '0', 
    'key4' => null, 
    3 => [
        0 => ' first 3', 
        1 => false, 
        'key2' => '', 
        2 => '0', 
        'key5' => null, 
        'key6' => 12, 
        3 => [], 
        4 => 'first 4 '
    ], 
    4 => true, 
    5 => [], 
    'key8' => 'first 2 '
];
```

Example:
```php
Arrays::removeEmpty($array);
/**
* [
*     0 => ' first 1 ', 
*     3 => [
*         0 => ' first 3', 
*         1 => false, 
*         'key2' => '', 
*         2 => '0', 
*         'key5' => null, 
*         'key6' => 12, 
*         3 => [], 
*         4 => 'first 4 '
*     ], 
*     4 => true, 
*     'key8' => 'first 2 '
* ]
*/
```

Recursive:
```php
Arrays::removeEmpty($array, true);
/**
* [
*     0 => ' first 1 ', 
*     3 => [
*         0 => ' first 3', 
*         'key6' => 12, 
*         4 => 'first 4 '
*     ], 
*     4 => true, 
*     'key8' => 'first 2 '
* ]
*/
```

**REMOVE NULL data to array**

Data:
```php
$array = [
    0 => ' first 1 ', 
    'key1' => false, 
    1 => '', 
    2 => '0', 
    'key4' => null, 
    3 => [
        0 => ' first 3', 
        1 => false, 
        'key2' => '', 
        2 => '0', 
        'key5' => null, 
        'key6' => 12, 
        3 => [], 
        4 => 'first 4 '
    ], 
    4 => true, 
    5 => [], 
    'key8' => 'first 2 '
];
```

Example:
```php
Arrays::removeNull($array);
/**
* [
*     0 => ' first 1 ', 
*     'key1' => false, 
*     1 => '', 
*     2 => '0', 
*     3 => [
*         0 => ' first 3', 
*         1 => false, 
*         'key2' => '', 
*         2 => '0', 
*         'key5' => null, 
*         'key6' => 12, 
*         3 => [], 
*         4 => 'first 4 '
*     ], 
*     4 => true, 
*     5 => [], 
*     'key8' => 'first 2 '
* ]
*/
```

Recursive:
```php
Arrays::removeNull($array, true);
/**
* [
*     0 => ' first 1 ', 
*     'key1' => false, 
*     1 => '', 
*     2 => '0', 
*     3 => [
*         0 => ' first 3', 
*         1 => false, 
*         'key2' => '', 
*         2 => '0', 
*         'key6' => 12, 
*         3 => [], 
*         4 => 'first 4 '
*     ], 
*     4 => true, 
*     5 => [], 
*     'key8' => 'first 2 '
* ]
*/
```

**TRIM array data**

Data:
```php
$array = [
    0 => ' first 1 ', 
    'key1' => false, 
    1 => '', 
    2 => '0', 
    'key4' => null, 
    3 => [
        0 => ' first 3', 
        1 => false, 
        'key2' => '', 
        2 => '0', 
        'key5' => null, 
        'key6' => 12, 
        3 => [], 
        4 => 'first 4 '
    ], 
    4 => true, 
    5 => [], 
    'key8' => 'first 2 '
];
```

Example:
```php
Arrays::trim($array);
/**
* [
*     0 => 'first 1', 
*     'key1' => false, 
*     1 => '', 
*     2 => '0', 
*     'key4' => null,
*     3 => [
*         0 => ' first 3', 
*         1 => false, 
*         'key2' => '', 
*         2 => '0', 
*         'key5' => null, 
*         'key6' => 12, 
*         3 => [], 
*         4 => 'first 4 '
*     ], 
*     4 => true, 
*     5 => [], 
*     'key8' => 'first 2'
* ]
*/
```

Recursive:
```php
Arrays::trim($array, true);
/**
* [
*     0 => 'first 1', 
*     'key1' => false, 
*     1 => '', 
*     2 => '0', 
*     'key4' => null,
*     3 => [
*         0 => 'first 3', 
*         1 => false, 
*         'key2' => '', 
*         2 => '0', 
*         'key5' => null, 
*         'key6' => 12, 
*         3 => [], 
*         4 => 'first 4'
*     ], 
*     4 => true, 
*     5 => [], 
*     'key8' => 'first 2'
* ]
*/
```

**Array TO STRING**

Example:
```php
Arrays::toString([
    'option1' => 'value1',
    'option2' => 'value2',
]);
// option1:value1;option2:value2;
```

Change delimiter:
```php
Arrays::toString([
    'option1' => 'value1',
    'option2' => 'key1:value1;key1:value2;',
], '="', '" ');
// option1="value1" option2="key1:value1;key1:value2;" 
```

## Testing & Code Coverage

PHPUnit is used for unit testing. Unit tests ensure that class and methods does exactly what it is meant to do.

General PHPUnit documentation can be found at https://phpunit.de/documentation.html.

To run the PHPUnit unit tests, execute:
```bash
phpunit PATH/TO/PROJECT/tests/
```

If you want code coverage reports, use the following:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Used PHPUnit default config:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Donating

You can support this project [here](https://www.paypal.me/cseliseev/10usd). 
You can also help out by contributing to the project, or reporting bugs. 
Even voicing your suggestions for features is great. Anything to help is much appreciated.


## License

The ARRAYS CSE HELPERS is open-source PHP library licensed under the MIT license. Please see [License File](https://github.com/cs-eliseev/helpers-arrays/blob/master/LICENSE.md) for more information.

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)