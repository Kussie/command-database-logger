<?php

namespace Kussie\CommandDatabaseLogger\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Kussie\CommandDatabaseLogger\CommandLoggerServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CommandLoggerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_command_log_table.php.stub';
        $migration->up();
    }
}
