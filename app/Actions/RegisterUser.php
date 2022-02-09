<?php

namespace App\Actions;

use App\Contracts\Actions\RegistersUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterUser implements RegistersUser
{

    public function __invoke(array $data): User
    {
        $data = Validator::validate($data, [
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => Password::required(),
        ]);

        return User::create([
            ...$data,
            'password' => Hash::make($data['password']),
        ]);
    }

}
