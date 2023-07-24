<?php

declare(strict_types=1);

namespace TechDivision\Tests;
use PHPUnit\Framework\TestCase;
use TechDivision\AbstractLogger;

class AbstractLoggerTest extends TestCase
{
    private $logger;

    protected function setUp(): void
    {
        $this->logger = $this->getMockForAbstractClass(AbstractLogger::class);
    }

    public function testLogMethodExists()
    {
        $this->assertTrue(
            method_exists($this->logger, 'log'),
            'AbstractLogger should have a log method.'
        );
    }

    // Add more test cases for the log method and other functionalities of the AbstractLogger class
}
