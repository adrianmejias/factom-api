# Factom API for Laravel

[![Latest Version](https://img.shields.io/github/release/adrianmejias/factom-api.svg?style=flat-square)](https://github.com/adrianmejias/factom-api/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/adrianmejias/factom-api/master.svg?style=flat-square)](https://travis-ci.org/adrianmejias/factom-api)
[![Quality Score](https://img.shields.io/scrutinizer/g/adrianmejias/factom-api.svg?style=flat-square)](https://scrutinizer-ci.com/g/adrianmejias/factom-api)
[![StyleCI](https://styleci.io/repos/104237610/shield?branch=master)](https://styleci.io/repos/104237610)
[![Total Downloads](https://img.shields.io/packagist/dt/adrianmejias/factom-api.svg?style=flat-square)](https://packagist.org/packages/adrianmejias/factom-api)

This package provides a simple service provider for the Factom API for use with the Laravel Framework.

Factom API documentation: https://docs.factom.com/api

`Note: This package is under development and should not be used for production environments.`

## Installation

You can install this package via composer using:

```bash
composer require adrianmejias/factom-api
```

You must also install this service provider.

The package will automatically register itself.

To publish the config file to `app/config/factom-api.php`

```bash
php artisan vendor:publish --provider="AdrianMejias\FactomApi\FactomApiServiceProvider"
```

This will publish a file `factom-api.php` in your config directory with teh following content:

```php
<?php

return [
  
  /**
   * Base credentials for Factom server.
   */
  'url' => env('FACTOM_URL', 'http://localhost:8088/v2'),

  'ssl' => [
    'enable' => env('FACTOM_SSL', false),
    'certificate' => env('FACTOM_CERTIFICATE', storage_path('app/factomdAPIpub.cert')),
  ],

  'username' => env('FACTOM_USERNAME'),

  'password' => env('FACTOM_PASSWORD'),

  /**
   * Factom wallet server credentials.
   */
  'wallet' => [
    'url' => env('FACTOM_WALLET_URL', 'http://localhost:8089/v2'),

    'ssl' => [
      'enable' => env('FACTOM_WALLET_SSL', false),
      'certificate' => env('FACTOM_WALLET_CERTIFICATE', storage_path('app/factomdAPIpub.cert')),
    ],

    'username' => env('FACTOM_WALLET_USERNAME'),

    'password' => env('FACTOM_WALLET_PASSWORD'),
  ],

  /**
   * Factom debug server credentials.
   */
  'debug' => [
    'url' => env('FACTOM_DEBUG_URL', 'http://localhost:8088/debug'),

    'ssl' => [
      'enable' => env('FACTOM_DEBUG_SSL', false),
      'certificate' => env('FACTOM_DEBUG_CERTIFICATE', storage_path('app/factomdAPIpub.cert')),
    ],

    'username' => env('FACTOM_DEBUG_USERNAME'),

    'password' => env('FACTOM_DEBUG_PASSWORD'),
  ],

];
```

## Usage

After you've installed the package and filled in the values in the config-file working with this pacakge will be a breeze. All the following examples use the facade.

```php
Route::get('/factom/heights', function() {
  $result = FactomApi::heights();

  return response()->json($result);
});
```

## Testing

Run the tests with:
```bash
vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [adrianmejias@gmail.com](mailto:adrianmejias@gmail.com) instead of using the issue tracker.

## Credits

- [1000nettles](https://github.com/1000nettles/factom-api-php)
- [Factom](https://www.factom.com)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.