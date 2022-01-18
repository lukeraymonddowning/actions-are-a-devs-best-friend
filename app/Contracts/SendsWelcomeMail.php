<?php

namespace App\Contracts;

use App\Models\User;

interface SendsWelcomeMail
{
    public function __invoke(User $user): void;
}
