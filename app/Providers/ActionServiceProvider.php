<?php

namespace App\Providers;

use App\Actions\OnboardUser;
use App\Actions\RegisterUser;
use App\Actions\SendWelcomeMail;
use App\Contracts\Actions\OnboardsUser;
use App\Contracts\Actions\RegistersUser;
use App\Contracts\Actions\SendsWelcomeMail;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegistersUser::class => RegisterUser::class,
        SendsWelcomeMail::class => SendWelcomeMail::class,
        OnboardsUser::class => OnboardUser::class,
    ];
}
