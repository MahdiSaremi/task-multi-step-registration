<?php

use App\Http\Controllers\UserFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/{user}', );

Route::controller(UserFormController::class)->group(function () {


    Route::get('/state/{state}', 'state');

});
