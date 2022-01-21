<?php

namespace App\Contracts\Actions;

use App\Models\User;

interface SendsWelcomeMail
{
    public function __invoke(User $user): void;
}
