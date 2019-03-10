ARRAYS CSE HELPERS
=======

Array helpers provides extra static methods allowing you to deal with arrays more efficiently.

Project repository: https://github.com/cs-eliseev/helpers-arrays

***


## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. ARRAY CSE HELPERS provides extra static methods allowing you to deal with arrays more efficiently.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers projec:**
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Math converter CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)

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


## License

See the [LICENSE.md](https://github.com/cs-session/helpers-arrays/blob/master/LICENSE.md) file for licensing details.