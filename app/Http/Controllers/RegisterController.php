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
        $user = User::register($request->all());

        $auth->login($user);

        return redirect(route('home'))->with('poop', true);
    }

}
