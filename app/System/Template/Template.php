<?php

namespace App\System\Template;

class Template
{
    public static function view(string $view, array $vars = [])
    {
        extract($vars);
        include __DIR__ . "/../../../views/$view.view.php";
    }
}