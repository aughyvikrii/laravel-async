# Laravel Async

https://github.com/aughyvikrii/laravel-async/assets/61919774/069b733a-7307-40ce-80c2-d5c29543cff4

Laravel Async is a simple package for Laravel that enables you to run your code asynchronously without using
the workers and Supervisor!

Unlike the Laravel Process, Symfony Process, or other similar packages, You don't need to wait for the sub-processes in the main process to finish!

```php
use Aughyvikrii\LaravelAsync\Facades\AsyncHandler;

AsyncHandler::dispatch(function () {
    sleep(10);
    
    info("Hello from Async process after 10 seconds!");
});

info("dispatched the process!");
```

## Demo

https://youtu.be/0q8ki5JiD2o?si=Pi1X5zV5oM6Ktae3

## How it works?

You can call it a hack or a trick! but Laravel Async uses the background process of the OS to run your code.

It provides a simple Laravel Console Command that unserializes your code and runs it in the background of the OS.

## Supported OS

Currently, it only supports Linux and Unix-based operating systems.

## Installation

You can install the package via Composer:

```bash
composer require /laravel-async
```

## Configuration

To publish the configuration file, you can run the following command:

```bash
php artisan vendor:publish --provider="Aughyvikrii\LaravelAsync\LaravelAsyncServiceProvider"
```

This will create a `laravel-async.php` file in your `config` directory.

**php_path**

The path to the PHP executable.
The default value which is the path to the PHP binary should work for CLI usage.
However, If you want to use it in web, You should set the path to the PHP binary because the default value will
be the path to the web server's PHP binary like php-fpm.

You can also set via the `.env` file.

```dotenv
LARAVEL_ASYNC_PHP_PATH=/path/to/php
```

## Usage

The usage is very simple and straightforward. You can provide the Closure or your Laravel Job class to the `AsyncHandler` facade.

### Closure

```php
use Aughyvikrii\LaravelAsync\Facades\AsyncHandler;

AsyncHandler::dispatch(function () {
    info("Hello from Async process!");
});
```

### Job

You can send Jobs or any other classes that have a `handle` method.

```php
use Aughyvikrii\LaravelAsync\Facades\AsyncHandler;

AsyncHandler::dispatch(new MyJob());
```

### Timeouts

The default timeout is 60 seconds.

This will set a timeout of 10 seconds to the process and if it didn't finish in 10 seconds it will kill the process.

```php
use Aughyvikrii\LaravelAsync\Facades\AsyncHandler;

AsyncHandler::timeout(10)->dispatch(function () {
    info("Hello from Async process!");
});
```

You can also dispatch without a timeout! 

!!! Be careful about this because if your code gets stuck in an infinite loop, it will drain your server resources.

```php
use Aughyvikrii\LaravelAsync\Facades\AsyncHandler;

AsyncHandler::withoutTimeout()->dispatch(function () {
    info("Hello from Async process!");
});
```

## Testing

You can fake the `AsyncHandler`'s facade in your tests and check if the code is dispatched or not.

```php

use Aughyvikrii\LaravelAsync\Facades\AsyncHandler;

AsyncHandler::fake();

// Your code that dispatches the AsyncHandler

AsyncHandler::assertDispatchedCounts(1);
```

You can test to see how many times you dispatched an async process.

## Contributing

Please feel free to submit an issue or open a PR.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
