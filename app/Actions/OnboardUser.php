<?php

namespace App\Actions;

use App\Contracts\Actions\OnboardsUser;
use App\Contracts\Actions\RegistersUser;
use App\Contracts\Actions\SendsWelcomeMail;
use App\Models\User;

class OnboardUser implements OnboardsUser
{
    public function __construct(
        private RegistersUser $registerUser,
        private SendsWelcomeMail $sendWelcomeMail,
    )
    {

    }

    public function __invoke(array $data): User
    {
        $user = ($this->registerUser)($data);
        ($this->sendWelcomeMail)($user);

        return $user;
    }
}
