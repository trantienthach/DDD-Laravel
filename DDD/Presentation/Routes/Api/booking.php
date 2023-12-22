<?php

use DDD\Presentation\Controllers\Api\User\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('booking.')->group(function() {
    Route::get('/booking', function() {
        return 'PONG';
    });

    Route::get('/booking-view', function(){
        return view('home');
    })->name('home');

    Route::get('/properties', function(){
        return view('properties');
    })->name('properties');

    Route::get('/property-details', function(){
        return view('/property-details');
    })->name('property-details');

    Route::get('/contact', function(){
        return view('/contact');
    })->name('contact');
    Route::get('/signin', [AuthController::class, 'signin']);
});
