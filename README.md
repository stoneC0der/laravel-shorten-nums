# Shorten Numbers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stonec0der/shorten-nums.svg?style=flat-square)](https://packagist.org/packages/stonec0der/shorten-nums)
[![Build Status](https://img.shields.io/travis/stonec0der/laravel-shorten-nums/master.svg?style=flat-square)](https://travis-ci.org/stoneC0der/laravel-shorten-nums)
[![Quality Score](https://img.shields.io/scrutinizer/g/stoneC0der/laravel-shorten-nums.svg?style=flat-square)](https://scrutinizer-ci.com/g/stoneC0der/laravel-shorten-nums)
[![Total Downloads](https://img.shields.io/packagist/dt/stonec0der/shorten-nums.svg?style=flat-square)](https://packagist.org/packages/stonec0der/shorten-nums)

This is simple package to convert 12894090 views to 12.9M views. I wrote this as I need this functionality and did not want to use a library, i am sure there is a much better one out there but if you want something simple feel free to use.

## Installation

You can clone this repo

```bash

git clone https://github.com/stoneC0der/laravel-shorten-nums.git
```

Or via composer:

```bash
composer require stonec0der/shorten-nums
```

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

The shortenNumber accept an option parameter length which is the length of value passed.

```php
/*
Default
This enable you to return for 1240 => 1.2K with default precisionn
and 1.24 with $precision set to 2 and so on.
*/
$value = '1240';
$precision = 1;

$formated_number = ShortenNumsFacade::readableNumber($value, $precision=2);
// Output
// 1.24K
```

If you know in advance the length of the value, let's you expect the value to be between 999,999 & 999,999,999.
You can directly call a method associated with Millions

```php

$value = '8525000';
$formated_number = ShortenNumsFacade::readableMillion($value, 2);
// Output
// 8.53M
```

In most case you will want to use ```ShortenNumsFacade::readableNumer($number);```

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
