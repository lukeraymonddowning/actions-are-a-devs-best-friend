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

    expect(User::query()->exists())->toBeTrue();
});

it('requires valid data', function (array $data, array $errors) {
    User::factory()->create(['email' => 'foo@bar.com']);

    $command = $this->artisan('register', array_merge([
        'email' => $this->faker->email,
        'name' => $this->faker->name,
        'password' => $this->faker->password,
    ], $data));

    $command->assertFailed();

    try {
        $command->run();
    } catch (ValidationException $exception) {
        foreach ($errors as $key => $error) {
            expect(json_encode($exception->errors()[$key]))->toContain($error);
        }
    }
})->with([
    'email not an email' => [['email' => 'foo'], ['email' => 'valid']],
    'email already taken' => [['email' => 'foo@bar.com'], ['email' => 'taken']],

    'name not a string' => [['name' => 123], ['name' => 'string']],
    'name longer than 255 characters' => [['name' => str_repeat('a', 256)], ['name' => 'must not be greater than 255 characters']],

    'password less than 8 characters' => [['password' => '1234567'], ['password' => 'must be at least 8 characters']],
    'password not mixed case' => [['password' => '12345678'], ['password' => 'must contain at least one uppercase and one lowercase letter']],
    'password no numbers' => [['password' => 'abcdefgh'], ['password' => 'must contain at least one number']],
]);
