<?php

declare(strict_types=1);

namespace TechDivision;

/**
 * The available log levels.
 *
 * @category   TechDivision
 * @subpackage Example
 * @copyright  2020 TechDivision GmbH <info@techdivision.com>
 * @author     Tim Wagner <t.wagner@techdivision.com>
 */
class LogLevel
{
    /**
     * Log level for informational messages.
     *
     * @var string
     */
    public const INFO = 'info';

    /**
     * Log level for warnings.
     *
     * @var string
     */
    public const WARNING = 'warning';

    /**
     * Log level for errors.
     *
     * @var string
     */
    public const ERROR = 'error';

    /**
     * Make method private to disable direct instantiation.
     */
    private function __construct()
    {
    }

    /**
     * Make method private to disable cloning.
     *
     * @return void
     */
    private function __clone()
    {
    }
}
