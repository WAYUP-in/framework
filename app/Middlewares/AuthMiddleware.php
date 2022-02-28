<?php

namespace App\Middlewares;

use App\Services\Users\User;
use App\System\Router\Redirect;

class AuthMiddleware extends Middleware
{
    public function __construct(array $params = [], array $data = [])
    {
        parent::__construct($params, $data);
    }

    public function handle()
    {
        if (!User::loggedIn()) {
            Redirect::to('/account');
            die();
        }
    }
}