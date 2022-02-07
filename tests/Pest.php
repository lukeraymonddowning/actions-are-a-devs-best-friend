<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use Illuminate\Validation\ValidationException;

uses(Tests\TestCase::class)->in('Feature');

expect()->extend('toBeInvalid', function ($errors) {
    try {
        $this->value->__invoke();
        test()->fail('No validation exception was thrown!');
    } catch (ValidationException $exception) {
        foreach ($errors as $key => $error) {
            expect(json_encode($exception->errors()[$key]))->toContain($error);
        }
    }
});
