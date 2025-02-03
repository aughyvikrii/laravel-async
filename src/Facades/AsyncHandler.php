<?php

namespace Aughyvikrii\LaravelAsync\Facades;

use Illuminate\Support\Facades\Facade;
use Aughyvikrii\LaravelAsync\AsyncProcess;
use Aughyvikrii\LaravelAsync\Fakers\AsyncProcessFake;

/**
 * @method static void dispatch(mixed $object)
 * @method static AsyncProcess timeout(?int $timeout)
 * @method static AsyncProcess withoutTimeout()
 * @method static void assertDispatchedCounts(int $count)
 * @method static void assertExecutedCommandContains(string $command)
 */
class AsyncHandler extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'async-handler';
    }

    public static function fake(): AsyncProcessFake
    {
        static::swap($fake = new AsyncProcessFake());

        return $fake;
    }
}
