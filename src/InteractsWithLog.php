<?php

namespace App\Concerns;

trait InteractsWithLog
{
    /**
     * Log data.
     *
     * @param string $string
     * @param array $args
     * @return void
     */
    protected function logger($string, $args = [])
    {
        logger($string, $args);
    }
}
