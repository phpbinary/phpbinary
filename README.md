# phpbinary

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A PHP library that can be used to work with binary data.

## Install

Via Composer

``` bash
$ composer require phpbinary/phpbinary
```

## Usage

``` php
$stream = new Stream(fopen('awesome.bin', 'rb'));
$value = $stream->readInt16();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email phpbinary@example.com instead of using the issue tracker.

## Credits

- [Walter Tamboer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/phpbinary/phpbinary.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/phpbinary/phpbinary/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/phpbinary/phpbinary.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/phpbinary/phpbinary.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/phpbinary/phpbinary.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/phpbinary/phpbinary
[link-travis]: https://travis-ci.org/phpbinary/phpbinary
[link-scrutinizer]: https://scrutinizer-ci.com/g/phpbinary/phpbinary/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/phpbinary/phpbinary
[link-downloads]: https://packagist.org/packages/phpbinary/phpbinary
[link-author]: https://github.com/waltertamboer
[link-contributors]: ../../contributors
