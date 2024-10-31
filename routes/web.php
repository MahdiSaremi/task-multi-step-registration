<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationStateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{user}', UserController::class);

Route::controller(RegistrationStateController::class)
    ->group(function () {

        Route::get('/register/{state}', 'show')->name('register-state');

    });
