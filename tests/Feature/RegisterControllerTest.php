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

    expect(User::query()->exists())->toBeTrue();
});

it('is invalid', function (array $data, array $errors) {
    User::factory()->create(['email' => 'foo@bar.com']);

    $response = $this->post(route('users.register'), $data);

    $response->assertInvalid($errors);
})->with([
    'email null' => [['email' => null], ['email' => 'required']],
    'email ! an email' => [['email' => 'foo'], ['email' => 'valid']],
    'email taken' => [['email' => 'foo@bar.com'], ['email' => 'taken']],

    'name null' => [['name' => null], ['name' => 'required']],
    'name ! a string' => [['name' => 123], ['name' => 'string']],
    'name > 255 characters' => [['name' => str_repeat('a', 256)], ['name' => 'must not be greater than 255 characters']],

    'password null' => [['password' => null], ['password' => 'required']],
    'password < 8 characters' => [['password' => '1234567'], ['password' => 'must be at least 8 characters']],
    'password ! mixed case' => [['password' => '12345678'], ['password' => 'must contain at least one uppercase and one lowercase letter']],
    'password no numbers' => [['password' => 'abcdefgh'], ['password' => 'must contain at least one number']],
]);
