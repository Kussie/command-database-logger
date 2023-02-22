<?php

namespace Kussie\CommandDatabaseLogger\Traits;

trait UseCommandLogger {
    public function info($string, $verbosity = null, $context = []): void
    {
        echo 'test123';
        parent::info($string, $verbosity);
    }
}