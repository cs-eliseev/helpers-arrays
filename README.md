ARRAYS CSE HELPERS
=======

Array helpers provides extra static methods allowing you to deal with arrays more efficiently.

Project repository: https://github.com/cs-eliseev/helpers-arrays

***


## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. ARRAY CSE HELPERS provides extra static methods allowing you to deal with arrays more efficiently.

CSE HELPERS was created for the rapid development of web applications.

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
```shell
composer require cse/helpers-arrays
```

Or file composer.json should include the following contents:
```
{
    "require": {
        "cse/helpers-arrays": "*"
    }
}
```

### Git

Clone this repository locally:
```
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


## License

See the [LICENSE.md](https://github.com/cs-session/helpers-arrays/blob/master/LICENSE.md) file for licensing details.