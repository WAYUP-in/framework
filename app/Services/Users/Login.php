<?php

namespace App\Services\Users;

use App\Exceptions\ValidationException;
use App\System\Config;
use App\System\Cookies\Cookie;
use App\System\Database\ORM;
use App\System\Helpers\Random;

class Login
{
    public const USERNAME_COLUMN = 'email';

    public function prepareData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password']
        ];
    }

    public function validate(array $data)
    {
        if (empty($data['email'])) {
            throw new ValidationException('Field email is empty');
        }
        if (empty($data['password'])) {
            throw new ValidationException('Field password is empty');
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException('Incorrect email format');
        }
    }

    public function auth(string $username, string $password)
    {
        $user = ORM::find(Config::auth('table'), [
            'email' => $username
        ]);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $token = Random::str(30);
                ORM::update(Config::auth('table'), [
                    'token' => $token
                ], ['email' => $username]);
                Cookie::set('token', $token);
            } else {
                Cookie::set('error', 'Incorrect login data');
            }
        } else {
            Cookie::set('error', 'Incorrect login data');
        }
    }
}