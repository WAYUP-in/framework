<?php

namespace App\System\Cookies;

use App\System\Template\Template;

class Message
{
    public const DANGER = 'system/alerts/danger';
    public const SUCCESS = 'system/alerts/success';

    public static function danger(string $cookieKey = 'error')
    {
        $message = Cookie::get($cookieKey, true);
        if (!empty($message)) {
            Template::view(self::DANGER, ['message' => $message]);
        }
    }

    public static function success(string $cookieKey = 'message')
    {
        $message = Cookie::get($cookieKey, true);
        if (!empty($message)) {
            Template::view(self::SUCCESS, ['message' => $message]);
        }
    }
}