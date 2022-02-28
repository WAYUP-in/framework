<?php

use App\System\Router\Route;
use App\Controllers\PagesController;
use App\Controllers\UserController;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;

Route::page('/', PagesController::class, 'index');
Route::page('/about', PagesController::class, 'about');
Route::page('/account', PagesController::class, 'account', AuthMiddleware::class);
Route::page('/login', PagesController::class, 'login', GuestMiddleware::class);
Route::page('/register', PagesController::class, 'register', GuestMiddleware::class);

Route::post('/register', UserController::class, 'register', GuestMiddleware::class);
Route::post('/login', UserController::class, 'login', GuestMiddleware::class);
Route::post('/logout', UserController::class, 'logout', AuthMiddleware::class);