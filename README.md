
# Laravel Command Database Logger

This package provides a driver and trait to store command output as log messages in the database.  It can also be used as a standalone package to store log messages in the database.

```php
use Illuminate\Support\Facades\Log;

Log::channel('commands')->info('Your message');
```

## Installation

You can install the package via composer:

```bash
composer require kussie/laravel-command-db-logger
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="log-db-migrations"
php artisan migrate
```

Now add a new channel to `config/logging.php`.

```php
use Kussie\CommandDatabaseLogger\CommandLogger;

return [
    'channels' => [
        'commands' => [
            'driver' => 'custom',
            'via'    => CommandLogger::class,
        ],
    ]   
]
```

## Usage

Add the following trait to the commands which you want to log the output of:

```php
use Kussie\CommandDatabaseLogger\Traits\UseCommandLogger;
```

Any output that the command outputs via `info` or `error` commands will be logged to the database and output on the CLI as per normal.

## Credits
- Ben Kuskopf
- [Yoeri Boven](https://twitter.com/yoeriboven)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.