<?php

namespace App\Services\Users;

use App\Exceptions\ValidationException;

class Register
{
    public function prepareData(array $data): array
    {
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ];
    }

    public function validate(array $data)
    {
        if (empty($data['name'])) {
            throw new ValidationException('Field name is empty');
        }
        if (empty($data['email'])) {
            throw new ValidationException('Field email is empty');
        }
        if (empty($data['password'])) {
            throw new ValidationException('Field password is empty');
        }
        if (empty($data['password_confirmation'])) {
            throw new ValidationException('Field password_confirmation is empty');
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException('Incorrect email format');
        }
        if ($data['password'] !== $data['password_confirmation']) {
            throw new ValidationException('Password and password confirmation do not match');
        }
    }
}