<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => 'Welcome home!')->name('home');

Route::post('/users', RegisterController::class)->name('users.register');
