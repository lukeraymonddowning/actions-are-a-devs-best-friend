<?php

use App\Mail\WelcomeMail;
use App\Models\User;

Route::get('/', fn () => view('home', [
    'users' => User::query()->latest()->get(),
    'names' => [
        'Luke Downing',
        'Taylor Otwell',
        'Erika Heidi',
        'Aaron Francis',
        'Freek van der Herten',
        'Steve Mcdougall',
    ],
    'emails' => [
        'luke@downing.tech',
        'taylor@laravel.com',
        'erika@sourcegraph.com',
        'aaron@hammerstone.dev',
        'freek@spatie.be',
        'steve@jump24.com',
    ],
]))->name('home');

Route::get('/mail/{user:email}', fn (User $user) => new WelcomeMail($user));
