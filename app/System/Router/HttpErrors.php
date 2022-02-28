<?php

namespace App\System\Router;

use App\System\Template\Template;

trait HttpErrors
{
    protected static function notFound(?string $message = NULL): void
    {
        Template::view('system/errors/404', [
            'message' => $message ?? 'Page not found'
        ]);
        http_response_code(404);
        die();
    }
}