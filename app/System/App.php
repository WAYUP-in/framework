<?php

namespace App\System;

use App\System\Database\ORM;
use App\System\Router\Route;
use App\System\Router\Router;
use App\System\Template\Template;

class App
{
    public static function start()
    {
        Config::init();
        if (Config::db('enabled')) {
            try {
                ORM::connect(
                    Config::db('user'),
                    Config::db('password'),
                    Config::db('database'),
                    Config::db('driver'),
                    Config::db('host'),
                    Config::db('port'),
                );
            } catch (\PDOException $e) {
                Template::view('system/errors/database', [
                    'message' => $e->getMessage()
                ]);
            }
        }
        require_once __DIR__ . '/../../router/routes.php';
        Router::init(Route::list());
    }
}