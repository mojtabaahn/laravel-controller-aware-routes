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

Routes::make('UserController')->methods(function (ControllerAwareRouter $router) {
    $router->get('user/{user}', 'profile')->name('user.profile');
    $router->get('user/{user}/post/{post}','post')->name('user.post');
});

// Or

Routes::make()
    ->controller('UserController')
    ->methods(function (ControllerAwareRouter $router) {
        $router->get('user/{user}', 'profile')->name('user.profile');
        $router->get('user/{user}/post/{post}','post')->name('user.post');
    });

// Same as

Route::get('user/{user}', 'UserController@profile')->name('user.profile');
Route::get('user/{user}/post/{post}','UserController@posts')->name('user.posts');

// Using RouteRegistrar methods

Routes::make()
    ->prefix('user/{user}')
    ->name('user.')
    ->middleware('web')
    ->controller('UserController')
    ->methods(function (ControllerAwareRouter $router) {
        $router->get('/', 'profile')->name('profile');
        $router->get('posts','posts')->name('posts');
    });

// same as 

Routes::prefix('user/{user}')
    ->name('user.')
    ->middleware('web')
    ->group(function(){
        Route::get('/', 'UserController@profile')->name('profile');
        Route::get('posts','UserController@posts')->name('posts');
    });

```

## Testing

``` bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
