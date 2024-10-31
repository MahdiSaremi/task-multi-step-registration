<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{user}', UserController::class);

Route::controller(UserFormController::class)
    ->group(function () {

        Route::get('/form/{formState}', 'showFormState');

    });
