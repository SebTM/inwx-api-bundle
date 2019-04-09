# INWX Service Provider for Symfony

[![Build Status](https://travis-ci.com/SebTM/inwx-api-bundle.svg?branch=master)](https://travis-ci.com/SebTM/inwx-api-bundle)
[![Coverage Status](https://coveralls.io/repos/github/SebTM/inwx-api-bundle/badge.svg)](https://coveralls.io/github/SebTM/inwx-api-bundle)
[![Total Downloads](https://img.shields.io/packagist/dt/SebTM/inwx-api-bundle.svg)](https://packagist.org/packages/SebTM/inwx-api-bundle)
[![GitHub license](https://img.shields.io/github/license/SebTM/inwx-api-bundle.svg)](https://github.com/SebTM/inwx-api-bundle/blob/master/LICENSE.md)

A Symfony bundle for including the [INWX PHP-Client](https://github.com/inwx/php-client).

## Installation

The INWX bundle can be installed via [Composer](http://getcomposer.org) by 
requiring the `sebtm/inwx-api-bundle` package in your project's `composer.json`:

```json
{
    "require": {
        "sebtm/inwx-api-bundle": "~0.3"
    }
}
```

and adding an instance of `SebTM\INWX\InwxApiBundle` to your application's kernel:

```php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            ...
            new \SebTM\INWX\InwxApiBundle(),
        ];
    }
    ...
}
```
(This is NOT needed for Symfony-Flex while using recipes!)

## Configuration
### Sample YML Configuration

The sample configuration which can be placed in `app/config/config.yml` file.

```yaml
inwx_api:
    environment: "production"
    username: "username"
    password: "password"
    language: "en"
    debug: false
```

Supported environments: "production", "test"
Supported languages: see documentation of INWX PHP-Client

## Usage

This bundle exposes an instance of the `SebTM\INWX\Domrobot` object:

```
Service | Instance Of
--- | ---
inwx_api | SebTM\INWX\Domrobot
```

## Links
* [INWX PHP-Client on Github](https://github.com/inwx/php-client)
* [INWX PHP-Client Documentation](https://www.inwx.de/en/help/apidoc)
* [License](https://opensource.org/licenses/MIT)
* [Symfony website](http://symfony.com/)
