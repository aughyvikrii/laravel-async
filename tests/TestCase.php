<?php

namespace Aughyvikrii\LaravelAsync\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Aughyvikrii\LaravelAsync\LaravelAsyncServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelAsyncServiceProvider::class,
        ];
    }
}
