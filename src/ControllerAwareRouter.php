<?php


namespace MojtabaaHN\LaravelControllerRoutes;


use BadMethodCallException;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Traits\Macroable;

/**
 * @method Route get(string $uri, string $action)
 * @method Route post(string $uri, string $action)
 * @method Route put(string $uri, string $action)
 * @method Route patch(string $uri, string $action)
 * @method Route delete(string $uri, string $action)
 * @method Route any(string $uri, string $action)
 * @method Route options(string $uri, string $action)
 * @method Route match(array $methods, string $uri, string $action)
 */
class ControllerAwareRouter
{
    use Macroable {
        Macroable::__call as macroableCall;
    }

    protected string $controller;

    protected Router $router;

    public function __construct(Router $router, string $controller)
    {
        $this->controller = $controller;
        $this->router = $router;
    }

    public function __call($name, $arguments)
    {
        $proxyArray = ['get', 'post', 'put', 'patch', 'delete', 'any', 'options', 'head'];

        if (in_array($name, $proxyArray)) {

            $arguments[1] = [$this->controller, $arguments[1]];

            return call_user_func_array([$this->router, $name], $arguments);

        }

        if ($name === 'resource') {
            return call_user_func_array([$this->router, 'resource'], [$arguments[0], $this->controller, $arguments[1] ?? []]);
        }

        return $this->macroableCall($name, $arguments);
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function getController(): string
    {
        return $this->controller;
    }


}
