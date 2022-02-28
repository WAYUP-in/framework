<?php

namespace App\Controllers;
use App\Exceptions\ValidationException;
use App\System\Config;
use App\System\Cookies\Cookie;
use App\System\Database\ORM;
use App\System\Router\Redirect;
use App\Services\Users\Register as RegisterService;
use App\Services\Users\Login as LoginService;

class UserController
{
    private RegisterService $registerService;
    private LoginService $loginService;

    public function __construct()
    {
        $this->registerService = new RegisterService();
        $this->loginService = new LoginService();
    }

    public function register(array $data)
    {
        try {
            $this->registerService->validate($data['data']);
            $storeData = $this->registerService->prepareData($data['data']);
            ORM::insert(Config::auth('table'), $storeData);
            Cookie::set('message', 'Registration is successful');
        } catch (\PDOException|ValidationException $exception) {
            Cookie::set('error', $exception->getMessage());
        }
        Redirect::to('/register');
    }

    public function login(array $data)
    {
        try {
            $this->loginService->validate($data['data']);
            $loginData = $this->loginService->prepareData($data['data']);
            $this->loginService->auth($loginData['email'], $loginData['password']);
        } catch (\PDOException|ValidationException $exception) {
            Cookie::set('error', $exception->getMessage());
        }
        Redirect::to('/login');
    }

    public function logout()
    {
        Cookie::clear('token');
        Redirect::to('/login');
    }

}