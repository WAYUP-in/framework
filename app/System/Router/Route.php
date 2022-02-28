<?php

namespace App\System\Router;

class Route
{
    public const PAGE = 'page';
    public const ACTION = 'action';
    public static array $routes = [];

    public static function list(): array
    {
        return self::$routes;
    }

    public static function page(string $uri, $controller, string $action, ?string $middleware = NULL): void
    {
        self::$routes[] = [
            'uri' => $uri,
            'type' => self::PAGE,
            'method' => 'GET',
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public static function post(string $uri, $controller, string $action, ?string $middleware = NULL)
    {
        self::$routes[] = [
            'uri' => $uri,
            'type' => self::ACTION,
            'method' => 'POST',
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }
}