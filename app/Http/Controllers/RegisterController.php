<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

/**
 * @see https://stackoverflow.com/questions/30365169/access-controller-method-from-another-controller-in-laravel-5
 */
class RegisterController extends Controller
{
    public function __invoke(Request $request, StatefulGuard $auth)
    {
        $data = $this->validData($request);
        $user = User::query()->create(array_merge($data, [
            'password' => Hash::make($data['password'])
        ]));

        $auth->login($user);

        return redirect(route('home'))->with('poop', true);
    }

    private function validData(Request $request): array
    {
        return $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => Password::required(),
        ]);
    }

}
