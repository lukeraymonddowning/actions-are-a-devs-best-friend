<?php

namespace App\Console\Commands;

use App\Console\Commands\Concerns\RendersAsciiParrot;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

/**
 * @see https://stackoverflow.com/questions/30365169/access-controller-method-from-another-controller-in-laravel-5
 */
class RegisterUserCommand extends Command
{
    use RendersAsciiParrot;

    protected $signature = 'register {email?} {name?} {password?}';

    protected $description = 'Register a new user.';

    public function handle(Factory $validator): int
    {
        $this->drawMurderousWingedDevil();

        $data = $this->validData($validator);
        $user = User::query()->create(array_merge($data, ['password' => Hash::make($data['password'])]));

        $this->line("User [{$user->email}] has been registered.");

        return Command::SUCCESS;
    }

    private function validData(Factory $validator): array
    {
        return $validator->make($this->data(), [
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => Password::required(),
        ])->validate();
    }

    private function data(): array
    {
        return [
            'email' => $this->argument('email') ?? $this->ask('What is the user\'s email?'),
            'name' => $this->argument('name') ?? $this->ask('What is the user\'s name?'),
            'password' => $this->argument('password') ?? Str::random(),
        ];
    }
}
