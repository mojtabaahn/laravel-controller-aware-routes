# Laravel Controller Cenetered Routes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mojtabaahn/laravel-controller-routes.svg?style=flat-square)](https://packagist.org/packages/mojtabaahn/laravel-controller-routes)
[![Total Downloads](https://img.shields.io/packagist/dt/mojtabaahn/laravel-controller-routes?style=flat-square)](https://packagist.org/packages/mojtabaahn/laravel-controller-routes)
[![Repo Size](https://img.shields.io/github/repo-size/mojtabaahn/laravel-controller-routes?style=flat-square)](https://packagist.org/packages/mojtabaahn/laravel-controller-routes)
[![Repo Size](https://img.shields.io/packagist/l/mojtabaahn/laravel-controller-routes?style=flat-square)](https://packagist.org/packages/mojtabaahn/laravel-controller-routes)

## Requirement
This package requires **PHP 7.4** or higher.

## Installation

You can install the package via composer:

```bash
composer require mojtabaahn/laravel-controller-routes
```

## Usage

``` php
// routes/web.php

Routes::make()
    ->prefix('user/{user}')
    ->name('user.')
    ->middleware('web')
    // And other route-group methods provided by Illuminate\Routing\RouteRegistrar
    ->controller('UserController')
    ->methods(function (ControllerAwareRouter $router) {
        $router->get('/', 'profile')->name('profile');
        $router->get('posts','posts')->name('posts');
    });
```

## Testing

``` bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
