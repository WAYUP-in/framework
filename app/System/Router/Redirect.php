<?php

namespace App\System\Router;

class Redirect
{
    public static function to(string $uri)
    {
        header("Location: $uri");
    }
}