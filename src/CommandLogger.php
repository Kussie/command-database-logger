<?php

namespace Kussie\CommandDatabaseLogger;

use Monolog\Logger;

class CommandLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @return Logger
     */
    public function __invoke(array $config)
    {
        return new Logger('Database', [
            new CommandLoggerHandler(),
        ]);
    }
}