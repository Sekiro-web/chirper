<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::controller(ChirpController::class)->group(function () {
    Route::get('/', 'index')->name('Chirp.index');

    Route::middleware('auth')->group(function () {
        Route::post('/chirps', 'store')->name('Chirp.store');
        Route::get('/chirps/{chirp}/edit', 'edit')->name('Chirp.edit');
        Route::put('/chirps/{chirp}', 'update')->name('Chirp.update');
        Route::delete('/chirps/{chirp}', 'destroy')->name('Chirp.destroy');
    });
});

// Registration routes
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->middleware('guest')
    ->name('register.store');

// Login routes
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');

// Logout route
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');
