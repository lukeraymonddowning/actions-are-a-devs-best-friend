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

//    public function shouldHaveCalledAction(string $action)
//    {
//        $mock = $this->getMockBuilder($this->app->get($action)::class)
//            ->enableProxyingToOriginalMethods()
//            ->getMock();
//
//        $mock->expects($this->atLeastOnce())->method('__invoke');
//
//        $this->instance($action, $mock);
//    }
}
