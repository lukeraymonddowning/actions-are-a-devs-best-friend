<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StatefulGuard::class, function () {
            return $this->app->make(Factory::class)->guard('web');
        });
    }

    public function boot()
    {
        Model::unguard();

        Password::defaults(function () {
            return Password::min(8)->mixedCase()->numbers();
        });
    }
}
