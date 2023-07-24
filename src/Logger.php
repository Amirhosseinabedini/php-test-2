<?php

namespace TechDivision;

class Logger implements LoggerInterface
{
    public function info($message, $line = null): void
    {
        echo "TechDivision\\Example[info] " . date('Y-m-d H:i:s') . " - line $line $message" . PHP_EOL;
    }

    public function warning($message, $line = null): void
    {
        echo "TechDivision\\Example[warning] " . date('Y-m-d H:i:s') . " - line $line $message" . PHP_EOL;
    }

    public function error($message, $line = null): void
    {
        echo "TechDivision\\Example[error] " . date('Y-m-d H:i:s') . " - line $line $message" . PHP_EOL;
    }
}
