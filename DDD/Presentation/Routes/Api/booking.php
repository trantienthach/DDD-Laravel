<?php

use DDD\Presentation\Controllers\Api\Booking\BookingController;
use DDD\Presentation\Controllers\Api\Booking\PropertyController;

use Illuminate\Support\Facades\Route;

Route::prefix('booking')->name('booking.')->group(function () {
    Route::post('/add', [PropertyController::class, 'store'])->name('add');

    Route::get('/booking-view', [PropertyController::class, 'index'])->name('home');

    Route::get('/properties', [PropertyController::class, 'index'])->name('properties');

    Route::get('/booking/{id}', [PropertyController::class, 'show'])->name('show');
    Route::post('/booking/{id}', [BookingController::class, 'store'])->name('booking');
    // Route::get('/signin', [AuthController::class, 'signin']);
});
