[English](https://github.com/cs-eliseev/helpers-arrays/blob/master/README.md) | Русский

ARRAYS CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-arrays.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-arrays)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-arrays.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-arrays)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-arrays.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-arrays/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-arrays.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-arrays)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-arrays)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-arrays.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-arrays/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-arrays.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-arrays/archive/master.zip)

Данная библиотек состоит из статических методов, которые расширяют работу с массивами. 

Репозиторий проекта: https://github.com/cs-eliseev/helpers-arrays

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


## Описание проекта

CSE HELPERS - это набор из небольших библиотек с простыми функциями написанных на PHP специально для вас.

Несмотря на повсеместное использование PHP в качестве основного языка для WEB разработки, его зачастую недостаточно. ARRAYS CSE HELPERS, предоставляет дополнительные статические методы, позволяющие вам более эффективно работать с массивами.

CSE HELPERS создан для быстрой разработки веб-приложений.

**Список библиотек CSE Helpers:**
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

Ниже представлена информация об установке и перечне команд с примерами их использования.


## Установка

Самая последняя версия проекта доступна [здесь](https://github.com/cs-eliseev/helpers-arrays).

### Composer

Чтобы установить последнюю версию проекта, выполните следующую команду в терминале:
```shell
composer require cse/helpers-arrays
```

Или добавьте следующее содержимое в файл composer.json:
```json
{
    "require": {
        "cse/helpers-arrays": "*"
    }
}
```

### Git

Добавить этот репозиторий локально можно следующим образом:
```shell
git clone https://github.com/cs-eliseev/helpers-arrays.git
```

### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/helpers-arrays/archive/master.zip).

## Использование

Данный класс использует статические методы, которые удобно использовать в любом проекте. Смотрите пример [examples-arrays.php](https://github.com/cs-eliseev/helpers-arrays/blob/master/examples/examples-arrays.php).

**Получить значение по ключу массива**

Пример:
```php
Arrays::get([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
], 'key1');
// value1
```

Установить значение по умолчанию для несуществующих ключей массива:
```php
Arrays::get([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
], 'key4', 'default1');
// default1
```

**Забрать ключ из массива**

Пример:
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

Установить значение по умолчанию для несуществующих ключей массива:
```php
Arrays::pullKey([
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
], 'key4', 'default1');
// default1
```

**Преобразовать объект в массив**

Пример:
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

**Превратить массив в HTML тэг**

Пример:
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

**Превратить массив в MAP**

Данные:
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

Пример:
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

Пример с другим ключем:
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

Добавить группу значений:
```php
Arrays::map($array, 'keyGroup3', 'keyGroup1');
/**
* [
*     'value3' => null,
*     'value2' => 'value1'
* ]
*/
```

**Группировка значений массива**

Данные:
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

Пример:
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

Пример с другим ключем:
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

Добавить группу значений:
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

**Индексировать массив**

Данные:
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

Пример:
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

Пример с другим ключем:
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

Добавить группу значений:
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

**Добавить в массив не пустые значения**

Пример:
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

**Заменить пустые значения в массиве не пустыми**

Пример:
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

**Заменить данные в массиве не пустыми значениями**

Пример:
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

**Объединить не пустые данные массивов**

Пример:
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

**Заменить пустые данные массива на NULL**

Данные:
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

Пример:
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

Заменить пустых данных массива во вложенном массиве на NULL:
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

**Удалить пустые данные из массива**

Данные:
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

Пример:
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

Удалить пустые данные массива во вложенном массиве:
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

**Удалить NULL данные из массива**

Данные:
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

Пример:
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

Удалить NULLL данные во вложенном массиве:
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

**Очистка данных массива от лишних пробелов**

Данные:
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

Пример:
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

Очистка данных массива от лишних пробелов вместе с вложением:
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

**Превратить массив в строку вместе с ключами**

Пример:
```php
Arrays::toString([
    'option1' => 'value1',
    'option2' => 'value2',
]);
// option1:value1;option2:value2;
```

Изменить разделители:
```php
Arrays::toString([
    'option1' => 'value1',
    'option2' => 'key1:value1;key1:value2;',
], '="', '" ');
// option1="value1" option2="key1:value1;key1:value2;" 
```

## Тестирование и покрытие кода

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

Чтобы запустить тесты выполните:
```bash
phpunit PATH/TO/PROJECT/tests/
```

Чтобы сформировать отчет о покрытии тестами кода, необходимо выполнить следующую команду:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Чтобы использовать настройки по умолчанию, достаточно выполнить:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

ARRAYS CSE HELPERS это PHP-библиотека с открытым исходным кодом распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/helpers-arrays/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)