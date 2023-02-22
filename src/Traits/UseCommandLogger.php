<?php

namespace Kussie\CommandDatabaseLogger\Traits;

use Illuminate\Support\Facades\Log;

trait UseCommandLogger {

    /**
     * @param int|null|string $verbosity
     */
    public function info(string $string, $verbosity = null, array $context = []): void
    {
        $additionalContext = [
            'command' => $this->signature,
        ];

        if (!$context) {
            $context = $additionalContext;
        } else {
            $context = array_merge($context, $additionalContext);
        }

        Log::channel('commands')->info($string, $context);
        parent::info($string, $verbosity);
    }

    /**
     * @param int|null|string $verbosity
     */
    public function error(string $string, $verbosity = null, array $context = []): void
    {
        $additionalContext = [
            'command' => $this->signature,
        ];

        if (!$context) {
            $context = $additionalContext;
        } else {
            $context = array_merge($context, $additionalContext);
        }

        Log::channel('commands')->error($string, $context);
        parent::info($string, $verbosity);
    }
}
