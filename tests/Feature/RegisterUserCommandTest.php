<?php

use App\Models\User;
use Illuminate\Validation\ValidationException;

it('can register a user', function () {
    $command = $this->artisan('register', [
        'email' => 'foo@bar.com',
        'name' => 'John Doe',
        'password' => 'SuperSecr3tP4ssword!',
    ]);

    $command->assertSuccessful()->run();
})->shouldHaveCalledAction(\App\Contracts\Actions\RegistersUser::class);

it('is invalid', function (array $data, array $errors) {
    User::factory()->create(['email' => 'foo@bar.com']);

    $command = $this->artisan('register', [
        'email' => $this->faker->email,
        'name' => $this->faker->name,
        'password' => $this->faker->password,
        ...$data
    ]);

    $command->assertFailed();

    expect(fn () => $command->run())->toBeInvalid($errors);
})->with([
    'email ! an email' => [  // A description of our set of data.
        ['email' => 'foo'],   // The data we want to run our action with.
        ['email' => 'valid']  // The validation errors we expect to see.
    ],
]);
