<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->group(function () {
Route::get('/bookings', [BookingController::class, 'getBookings'])->name('api.bookings');
// });


Route::get('/reservations', [BookingController::class, 'getReservations'])->name('api.reservations');
Route::get('/reservations/{id}', [BookingController::class, 'getReservationDetails'])->name('api.reservation.details');
