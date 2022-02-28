<?php

namespace App\System\Cookies;

class Cookie
{
    public static function set(string $key, $value): void
    {
        setcookie($key, $value);
    }

    public static function get(string $key, bool $clear = false)
    {
        $v = $_COOKIE[$key] ?? NULL;
        if ($clear) {
            setcookie($key, NULL);
            unset($_COOKIE[$key]);
        }
        return $v;
    }

    public static function clear(string $key)
    {
        setcookie($key, NULL);
        unset($_COOKIE[$key]);
    }
}