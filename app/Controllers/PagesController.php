<?php

namespace App\Controllers;

use App\System\Template\Template;

class PagesController
{
    public function index()
    {
        Template::view('pages/index');
    }

    public function about()
    {
        Template::view('pages/about');
    }

    public function account()
    {
        Template::view('pages/account');
    }

    public function login()
    {
        Template::view('pages/login');
    }

    public function register()
    {
        Template::view('pages/register');
    }
}