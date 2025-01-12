# Laravel Package CMS

[![Latest Version on Packagist](https://img.shields.io/packagist/v/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/:vendor_slug/:package_slug/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/:vendor_slug/:package_slug/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
---
Laravel Package CMS is a package that allows you to create a CMS for your Laravel application.

## Installation

First install the package via composer:

```bash
composer require robinthijsen/laravel-cms
```

Then install the package

```bash
php artisan cms:install
```

This will publish the config file to `config/cms.php`. <br/>
Publish the migrations and ask to run them. <br/>
And add the service provider to your app.

## Usage

After that a new route is available at `/admin`. First you will need to login with the default credentials:

``` php
$email = config('cms.credentials.email');
$password = config('cms.credentials.password');
```

These are defined in the config file.
You can change it in the admin panel, as well as in the config file and in your `.env` file.

Hope this package is useful for you!

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
