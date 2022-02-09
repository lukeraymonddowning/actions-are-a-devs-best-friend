<?php

namespace App\Contracts\Actions;

use App\Models\User;

interface RegistersUser
{
    public function __invoke(array $data): User;
}
