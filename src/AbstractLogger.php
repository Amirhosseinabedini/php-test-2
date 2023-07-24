<?php

namespace TechDivision;

abstract class AbstractLogger implements LoggerInterface
{
    abstract protected function log($logLevel, $message, $line = null);
}
