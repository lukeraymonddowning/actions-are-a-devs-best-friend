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

uses(Tests\TestCase::class)->in('Feature');

/**
 * @param class-string $action
 */
function shouldCallAction(string $action, mixed $returnValue = null)
{
    test()->mock($action, fn($mock) => $mock
        ->shouldReceive('__invoke')
        ->atLeast()
        ->once()
        ->andReturn(value($returnValue))
    );

    return test();
}
