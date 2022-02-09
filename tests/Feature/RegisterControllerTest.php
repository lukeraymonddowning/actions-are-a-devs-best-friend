<?php

use App\Models\User;

it('can register a user', function () {
    $response = $this->post(route('users.register'), [
        'email' => 'foo@bar.com',
        'name' => 'John Doe',
        'password' => 'SuperSecr3tP4ssword!',
    ]);

    $response->assertRedirect(route('home'));
    expect(auth()->check())->toBeTrue();
})->shouldHaveCalledAction(\App\Contracts\Actions\RegistersUser::class);

it('is invalid', function (array $data, array $errors) {
    User::factory()->create(['email' => 'foo@bar.com']);

    $response = $this->post(route('users.register'), $data);

    $response->assertInvalid($errors);
})->with([
    'email ! an email' => [['email' => 'foo'], ['email' => 'valid']],
]);
