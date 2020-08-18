<?php

namespace MojtabaaHN\LaravelControllerRoutes\Tests;

use MojtabaaHN\LaravelControllerRoutes\RouteControllerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            RouteControllerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
