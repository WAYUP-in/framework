<?php

namespace App\Services\Users;

use App\System\Config;
use App\System\Cookies\Cookie;
use App\System\Database\ORM;

class User
{
    public static function data()
    {
        return ORM::find(Config::auth('table'), ['token' => Cookie::get('token')]);
    }

    public static function loggedIn(): bool
    {
        return is_string(Cookie::get('token')) && ORM::find(Config::auth('table'), ['token' => Cookie::get('token')]);
    }
}