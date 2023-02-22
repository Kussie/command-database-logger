<?php

namespace Kussie\CommandDatabaseLogger;

use Kussie\CommandDatabaseLogger\Models\CommandLog;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class CommandLoggerHandler extends AbstractProcessingHandler
{
    /**
     * @inheritDoc
     */
    protected function write(array|LogRecord $record): void
    {
        CommandLog::create([
            'level' => $record['level'],
            'level_name' => $record['level_name'],
            'message' => $record['message'],
            'logged_at' => $record['datetime'],
            'context' => $record['context'],
            'extra' => $record['extra'],
        ]);
    }
}
