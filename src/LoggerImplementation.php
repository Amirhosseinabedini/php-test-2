<?php

namespace TechDivision;

class LoggerImplementation extends AbstractLogger
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function log($logLevel, $message, $line = null)
    {
        // Implement the log functionality using the error_log function
        $logMessage = "TechDivision\\Example[$logLevel] " . date('Y-m-d H:i:s') . " - line $line $message";
        error_log($logMessage);
    }

    public function info($message, $line = null): void
    {
        $this->log('info', $message, $line);
    }

    public function warning($message, $line = null): void
    {
        $this->log('warning', $message, $line);
    }

    public function error($message, $line = null): void
    {
        $this->log('error', $message, $line);
    }
}
