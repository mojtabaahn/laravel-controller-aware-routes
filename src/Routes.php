<?php


namespace MojtabaaHN\LaravelControllerRoutes;


use Illuminate\Routing\RouteRegistrar;

/**
 * @method self as(string $value)
 * @method self domain(string $value)
 * @method self middleware(array|string|null $middleware)
 * @method self name(string $value)
 * @method self namespace(string $value)
 * @method self prefix(string $prefix)
 * @method self where(array $where)
 */
class Routes
{
    protected ?RouteRegistrar $routeRegistrar = null;
    protected ?string $controller = null;

    public function __construct(string $controller = null)
    {
        $this->controller = $controller;
    }

    public static function make(string $controller = null): self
    {
        return new static($controller);
    }

    public function getRegistrar()
    {
        return $this->routeRegistrar ?? new RouteRegistrar(app()->make('router'));
    }

    public function methods($callback): void
    {
        $this->getRegistrar()->group(function () use ($callback) {
            $callback(new ControllerAwareRouter(app()->make('router'), $this->controller));
        });
    }

    /**
     * @param string $controller
     * @return Routes
     */
    public function controller(string $controller): self
    {
        $this->controller = $controller;
        return $this;
    }

    public function __call($name, $arguments)
    {
        $this->routeRegistrar = call_user_func_array([$this->getRegistrar(), $name], $arguments);
        return $this;
    }


}
