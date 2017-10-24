# PHP Dates

[![Packagist](https://img.shields.io/packagist/v/ivandelabeldad/collections.svg)](https://packagist.org/packages/ivandelabeldad/collections)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/ivandelabeldad/collections/blob/master/LICENSE)

Basic Collections library for PHP


## Install
```
composer require ivandelabeldad/collections
```


## Usage

### Basic ArrayList operations
```php
// CREATE THE LIST
$list = new ArrayList();

// ADD ELEMENTS TO THE LIST
$list->add("element");
$list->addAll(["element1", "element2"]);

// REMOVE ALL ELEMENTS
$list->clear();

// REMOVE AN ELEMENT BASED ON ITS INDEX
$list->remove(0);

// ADD ELEMENT AT SPECIFIED POSITION
$list->addAt(10, "element in position 10");

// GET CURRENT SIZE OF THE LIST
$list->size();
```


## License

The API Rackian is open-sourced software licensed under
the [MIT LICENSE](https://github.com/ivandelabeldad/php-collections/blob/master/LICENSE)
