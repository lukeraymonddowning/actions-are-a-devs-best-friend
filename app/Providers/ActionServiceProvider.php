<?php

namespace App\Providers;

use App\Actions\SendWelcomeMail;
use App\Contracts\Actions\SendsWelcomeMail;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        SendsWelcomeMail::class => SendWelcomeMail::class,
    ];
}
