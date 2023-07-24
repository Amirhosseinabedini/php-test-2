<?php

declare(strict_types=1);

namespace TechDivision;
use TechDivision\Logger;


/**
 * Example to show how to use the logger.
 *
 * @category   TechDivision
 * @subpackage Example
 * @copyright  2020 TechDivision GmbH <info@techdivision.com>
 * @author     Tim Wagner <t.wagner@techdivision.com>
 */
class Example
{
    /**
     * The logger instance.
     *
     * @var LoggerInterface
     */
    protected $logger = null;

    /**
     * Simple array for the names.
     *
     * @var array
     */
    protected $names = [];

    /**
     * Initializes the example class with the names.
     *
     * @param array $names The names
     *
     * @return void
     * @todo Logger initialization
     */
    public function __construct($names = [])
    {
        // set the passed names
        $this->setNames($names);

        $logger = new Logger();
        $this->setLogger($logger);
    }

    /**
     * Setter implementation for the names.
     *
     * @param array $names The names
     *
     * @return void
     */
    public function setNames($names): void
    {
        $this->names = $names;
    }

    /**
     * Getter implementation for the names.
     *
     * @return array Array with the names
     */
    public function getNames(): array
    {
        return $this->names;
    }

    /**
     * Setter for the logger instance.
     *
     * @param LoggerInterface $logger The logger instance
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * Getter implementation for the logger instance.
     *
     * @return LoggerInterface The logger implementation
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Sorts the names in an alphabetical order using
     * PHP's usort function.
     *
     * @return void
     * @link http://php.net/usort
     * @todo Implement sort functionality using usort
     */
    public function sortNames(): void
    {
        // Sort names by using usort
        usort($this->names, function ($a, $b) {
            $lastNameA = $this->getLastName($a);
            $lastNameB = $this->getLastName($b);
            return strcmp($lastNameA, $lastNameB);
        });
    }

    private function getLastName(string $name): string
    {
        $parts = explode(' ', $name);
        return end($parts);
    }


    /**
     * Renders the names sorted on the console and writes a log
     * entry by using error_log for each of the sorted rows.
     *
     * @return void
     * @todo Render names on console and use logger to write names to logfile
     */
    public function renderNamesSorted(): void
    {
        $sortedNames = implode(', ', $this->names);
        echo $sortedNames . PHP_EOL;
    }
    
    
    
}
