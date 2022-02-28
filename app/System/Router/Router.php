<?php

namespace App\System\Router;

class Router
{
    use RouterTrait, HttpErrors;

    public static function init(array $routes)
    {
        $uri = self::uri();

        $route = array_filter($routes, function ($route) use ($uri) {
            return $route['method'] === self::method() && $route['uri'] === $uri;
        });

        if (empty($route)) {
            self::notFound();
        }

        $route = array_shift($route);
        $requestData = self::requestData();

        if (!is_null($route['middleware'])) {
            $middlewareClass = $route['middleware'];
            $middleware = new $middlewareClass($requestData['params'], $requestData['data']);
            $middleware->handle();
        }

        $controller = new $route['controller'];
        $action = $route['action'];

        if ($route['type'] === Route::ACTION && self::method() === 'POST') {
            $controller->$action($requestData);
        } else {
            echo $controller->$action();
        }
    }
}