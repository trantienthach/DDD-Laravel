<?php

use DDD\Presentation\Controllers\Api\User\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('manager.')->group(function () {
    Route::get('/', function () {
        return view('manage.layout');
    })->middleware('ddd.core.auth')->name('index');

    Route::get('/login-view', function () {
        return view('manage.login');
    })->name('login_view');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
