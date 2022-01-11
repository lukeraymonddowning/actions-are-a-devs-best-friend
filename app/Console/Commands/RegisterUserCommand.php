<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Validation\Rules\Password;

/**
 * @see https://stackoverflow.com/questions/30365169/access-controller-method-from-another-controller-in-laravel-5
 */
class RegisterUserCommand extends Command
{
    protected $signature = 'site:user:register {email} {name} {password}';

    protected $description = 'Register a new user.';

    public function handle(Factory $validator): int
    {
        $user = User::query()->create($this->data($validator));

        $this->line("User [{$user->email}] has been registered.");

        return Command::SUCCESS;
    }

    private function data(Factory $validator): array
    {
        return $validator->make([
            'email' => $this->argument('email'),
            'name' => $this->argument('name'),
            'password' => $this->argument('password'),
        ], [
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => Password::required(),
        ])->validate();
    }
}
