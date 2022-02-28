<?php

/*
 * Initialization autoloader & app helpers
 */

require_once __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/larapack/dd/src/helper.php';

use App\System\App;

/*
 * Running application
 */

App::start();

use App\Middlewares\AuthMiddleware;

new AuthMiddleware([], []);