<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery\MockInterface;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param $sClass
     * @return MockInterface
     */
    public function mockObjects($sClass): MockInterface
    {
        $obMock = \Mockery::mock($sClass);
        $this->app->instance($sClass, $obMock);
        return $obMock;
    }
}
