<?php

declare(strict_types=1);

namespace TechDivision;

/**
 * Logger interface with a method for each available log level.
 *
 * @category   TechDivision
 * @subpackage Logger
 * @copyright  2020 TechDivision GmbH <info@techdivision.com>
 * @author     Tim Wagner <t.wagner@techdivision.com>
 */
interface LoggerInterface
{
    /**
     * Logs an info message.
     *
     * @param string  $message The message to log
     * @param integer $line    The line where the error occurs
     *
     * @return void
     */
    public function info($message, $line = null): void;

    /**
     * Logs an warning message.
     *
     * @param string  $message  The message to log
     * @param integer $line The line where the error occurs
     *
     * @return void
     */
    public function warning($message, $line = null): void;

    /**
     * Logs an error message.
     *
     * @param string  $message The message to log
     * @param integer $line    The line where the error occurs
     *
     * @return void
     */
    public function error($message, $line = null): void;
}
