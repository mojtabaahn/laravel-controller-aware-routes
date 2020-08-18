<?php


namespace MojtabaaHN\LaravelControllerRoutes\Tests;


class TestController
{
    public function __invoke()
    {
        return 'Ook';
    }

    public function get()
    {
        return 'OK';
    }

    public function getId($id)
    {
        return $id;
    }
}
