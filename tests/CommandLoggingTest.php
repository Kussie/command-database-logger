<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;

uses(RefreshDatabase::class);

beforeEach(function () {
    config()->set('logging.channels.commands', [
        'driver' => 'custom',
        'via' => \Kussie\CommandDatabaseLogger\CommandLogger::class,
    ]);
});

it('logs to the database', function () {
    Log::channel('commands')->info('This is a test message');

    $this->assertDatabaseHas('command_logs', [
        'level_name' => mb_strtoupper('info'),
        'message' => 'This is a test message',
    ]);
});

it('stores the logs context', function () {
    Log::channel('commands')->info('This is a test message', ['command' => 'test:signiture']);

    $this->assertDatabaseHas('command_logs', [
        'context' => json_encode(['command' => 'test:signiture']),
    ]);
});
