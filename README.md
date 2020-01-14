# Shorten Numbers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stonec0der/shorten-nums.svg?style=flat-square)](https://packagist.org/packages/stonec0der/shorten-nums)
[![Build Status](https://img.shields.io/travis/stonec0der/shorten-nums/master.svg?style=flat-square)](https://travis-ci.org/stonec0der/shorten-nums)
[![Quality Score](https://img.shields.io/scrutinizer/g/stonec0der/shorten-nums.svg?style=flat-square)](https://scrutinizer-ci.com/g/stonec0der/shorten-nums)
[![Total Downloads](https://img.shields.io/packagist/dt/stonec0der/shorten-nums.svg?style=flat-square)](https://packagist.org/packages/stonec0der/shorten-nums)

This is simple package to convert 12894090 views to 12.8M views. I wrote this as I need this functionality and did not want to use a library, i am sure there is a much better one out there but if you want something simple feel free to use.

## Installation

You can install the package via composer:

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
$shortened = ShortenNumsFacade::shorten($value);

// Output will
12.8M.
```

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

- [Cedric Megnie](https://github.com/stonec0der)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).