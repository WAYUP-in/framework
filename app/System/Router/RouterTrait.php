<?php

namespace App\System\Router;

trait RouterTrait
{
    protected static function uri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    protected static function requestData(): array
    {
        return [
            'params' => $_GET,
            'data' => $_POST,
            'files' => $_FILES
        ];
    }

    protected static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}