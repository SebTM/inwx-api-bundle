# INWX-API-Bundle

[![Build Status](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2FSebTM%2Finwx-api-bundle%2Fbadge&style=flat)](https://actions-badge.atrox.dev/SebTM/inwx-api-bundle/goto)
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
        "sebtm/inwx-api-bundle": "~1.0"
    }
}
```

and adding an instance of `SebTM\INWX\InwxApiBundle` to your application's kernel:

```php
class AppKernel extends Kernel
{
    public function registerBundles(): void
    {
        return [
            new \SebTM\INWX\InwxApiBundle(),
        ];
    }
}
```
(This is NOT needed for Symfony-Flex while using recipes!)

## Configuration
### Sample YML Configuration

The sample configuration which can be placed in `app/config/config.yml` file.

```yaml
inwx_api:
    debug: false
    environment: "development"
    json: true
    language: "en"
    username: "username"
    password: "password"
```

Supported environments: "production", "development"
Supported languages: see documentation of INWX PHP-Client

## Usage

This bundle exposes an instance of the `SebTM\INWX\Domrobot` object:

```
Service | Instance Of
--- | ---
inwx_api | SebTM\INWX\Domrobot
```

It provides an additional function called "loginWrapper()" (BC >=1.0.0: login will not overwritten anymore!) for using 
the login data from configuration.

## Links
* [INWX PHP-Client on Github](https://github.com/inwx/php-client)
* [INWX PHP-Client Documentation](https://www.inwx.de/en/help/apidoc)
* [License](https://opensource.org/licenses/MIT)
* [Symfony website](http://symfony.com/)
