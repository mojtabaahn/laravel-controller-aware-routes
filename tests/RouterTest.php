<?php

namespace MojtabaaHN\LaravelControllerRoutes\Tests;

use Illuminate\Routing\Router;
use MojtabaaHN\LaravelControllerRoutes\ControllerAwareRouter;
use MojtabaaHN\LaravelControllerRoutes\Routes;

class RouterTest extends TestCase
{
    /**
     * @var Router
     */
    protected $router;

    public function setUp(): void
    {
        parent::setUp();

        /** @var Router $router */
        $this->router = $this->app->make('router');
    }

    /** @test */
    public function controller_helper_is_working()
    {
        Routes::make()
            ->prefix('test')
            ->name('test.')
            ->controller(TestController::class)
            ->methods(function (ControllerAwareRouter $router) {
                $router->get('get', 'get')->name('get');
                $router->get('invoke', '__invoke')->name('invokable');
                $router->post('id/{id}', 'getId')->name('getId');
            });

        $this->get('test/get')->assertOk();
        $this->post('test/id/55')->assertOk();
        $this->get('test/invoke')->assertOk();

    }
}
