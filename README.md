# Shorten Numbers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stonec0der/shorten-nums.svg?style=flat-square)](https://packagist.org/packages/stonec0der/shorten-nums)
[![Build Status](https://img.shields.io/travis/stonec0der/laravel-shorten-nums/master.svg?style=flat-square)](https://travis-ci.org/stoneC0der/laravel-shorten-nums)
[![Quality Score](https://img.shields.io/scrutinizer/g/stoneC0der/laravel-shorten-nums.svg?style=flat-square)](https://scrutinizer-ci.com/g/stoneC0der/laravel-shorten-nums)
[![Total Downloads](https://img.shields.io/packagist/dt/stonec0der/shorten-nums.svg?style=flat-square)](https://packagist.org/packages/stonec0der/shorten-nums)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This is simple package to convert 12894090 views to 12.9M views. Feel free to use.

## Installation

You can clone this repo

```bash

git clone https://github.com/stoneC0der/laravel-shorten-nums.git
```

Or via composer:

```bash
composer require stonec0der/shorten-nums
```
Publish the configuration file with
```bash
php artisant vendor:publish --provider="Stonec0der\ShortenNums\ShortenNumsServiceProvider"
```

This will publish a config file shorten-nums.php in the config folder. Set your default precision 
## Usage

Let's say you have a big integer value being return like 12894090 (views) and you want to display it like this 12.8M (views).

```php

use Stonec0der\ShortenNumsFacade

...
$value = '12894090';
// Shorten
$formated_number = ShortenNumsFacade::readableNumber($value);

// Output will
// 12.9M.
```

If you do not need the config file you can directly pass the precision when calling any method, else the default will be use

```php
/*
Default
This enable you to return for 1240 => 1.2K with default precisionn
and 1.24 with $precision set to 2 and so on.
*/
$value = '1240';
$precision = 2;

$formated_number = ShortenNumsFacade::readableNumber($value, $precision);
// Output
// 1.24K
```

If you expect the value to be between 999,999 & 999,999,999.
You can directly call a method associated with Millions

```php

$value = '8525000';
$formated_number = ShortenNumsFacade::readableMillion($value, 2);
// Output
// 8.53M
```

In most case you will want to use ```ShortenNumsFacade::readableNumer($number);```. If a value less than 999 is passed the value is return as it, if it greater than 999 Trillions return ```// 999+T```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email stonec0dersoft@gmail.com instead of using the issue tracker.

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
