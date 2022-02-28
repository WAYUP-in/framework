<?php

namespace App\System;

class Config
{
    protected static array $app;
    protected static array $db;
    protected static array $auth;

    public static function init()
    {
        self::$app = include_once __DIR__ . '/../../config/app.php';
        self::$db = include_once __DIR__ . '/../../config/database.php';
        self::$auth = include_once __DIR__ . '/../../config/auth.php';
    }
    
    public static function app(string $key): string|int|float|null|array
    {
        return self::$app[$key] ?? NULL;
    }

    public static function db(string $key): string|int|float|null|array
    {
        return self::$db[$key] ?? NULL;
    }

    public static function auth(string $key): string|int|float|null|array
    {
        return self::$auth[$key] ?? NULL;
    }
}