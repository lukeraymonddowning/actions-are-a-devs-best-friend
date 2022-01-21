<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/users', RegisterController::class)->name('users.register');
