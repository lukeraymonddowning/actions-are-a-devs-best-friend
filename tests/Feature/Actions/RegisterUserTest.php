<?php

use App\Actions\RegisterUser;
use App\Models\User;

it('can register a user', function () {
    $action = app(RegisterUser::class);

    $user = $action([
        'email' => 'foo@bar.com',
        'name' => 'John Doe',
        'password' => 'SuperSecr3tP4ssword!',
    ]);

    expect($user->refresh())
        ->email->toBe('foo@bar.com')
        ->name->toBe('John Doe');
});

it('is invalid', function (array $data, array $errors) {
    User::factory()->create(['email' => 'foo@bar.com']);

    $action = app(\App\Contracts\Actions\RegistersUser::class);

    expect(fn () => $action($data))->toBeInvalid($errors);
})->with([
    'email ! an email' => [  // A description of our set of data.
        ['email' => 'foo'],   // The data we want to run our action with.
        ['email' => 'valid']  // The validation errors we expect to see.
    ],
    'email taken' => [['email' => 'foo@bar.com'], ['email' => 'taken']],

    'name ! string' => [['name' => 123], ['name' => 'string']],
    'name > 255 characters' => [['name' => str_repeat('a', 256)], ['name' => 'must not be greater than 255 characters']],

    'password < 8 characters' => [['password' => '1234567'], ['password' => 'must be at least 8 characters']],
    'password ! mixed case' => [['password' => '12345678'], ['password' => 'must contain at least one uppercase and one lowercase letter']],
    'password no numbers' => [['password' => 'abcdefgh'], ['password' => 'must contain at least one number']],
]);
