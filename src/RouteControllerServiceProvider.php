<?php

namespace MojtabaaHN\LaravelControllerRoutes;

use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\ServiceProvider;

class RouteControllerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Router::macro('build', function () {
            return $this;
        });
    }

    public function register()
    {

    }
}
