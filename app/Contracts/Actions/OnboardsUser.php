<?php

namespace App\Contracts\Actions;

use App\Models\User;

interface OnboardsUser
{
    public function __invoke(array $data): User;
}
