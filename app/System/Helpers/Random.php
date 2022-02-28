<?php

namespace App\System\Helpers;

class Random
{
    private const CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function str(int $len = 10): string
    {
        $charactersLength = strlen(self::CHARS);
        $randomString = '';
        for ($i = 0; $i < $len; $i++) {
            $randomString .= self::CHARS[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}