<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BookingController;


// Protected Routes (Require Login)
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Role-based access: Admin and Staff for specific pages
    Route::middleware('role:admin,staff')->group(function () {
        // Replace the old single cars route with a resource route:
        Route::resource('cars', CarController::class);

        Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
        Route::get('/users', [UsersController::class, 'index'])->name('users');
    });
    // Role-based access: User for specific pages (if any)
});

// Public Routes (Accessible Without Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Logout Route (Accessible After Login)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

// Default Route Redirects Dynamically
Route::get('/', function () {
    return redirect('/login');
});

// Test DB Connectivity
Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "Connected to database: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "Database connection error: " . $e->getMessage();
    }
});

require __DIR__ . '/auth.php';
