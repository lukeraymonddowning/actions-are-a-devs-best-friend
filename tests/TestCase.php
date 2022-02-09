<?php

namespace Tests;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use LazilyRefreshDatabase;
    use WithFaker;

    public function shouldHaveCalledAction(string $action)
    {
        $original = $this->app->make($action);

        $this->mock($action)
            ->shouldReceive('__invoke')
            ->atLeast()->once()
            ->andReturnUsing(fn(...$args) => $original(...$args));
    }
}
