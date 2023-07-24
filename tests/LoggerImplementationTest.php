<?php

declare(strict_types=1);

namespace TechDivision\Tests;
use PHPUnit\Framework\TestCase;
use TechDivision\LoggerImplementation;

class LoggerImplementationTest extends TestCase
{
    private $logger;

    protected function setUp(): void
    {
        $this->logger = LoggerImplementation::getInstance();
    }

    public function testLoggerInstance()
    {
        $this->assertInstanceOf(
            LoggerImplementation::class,
            $this->logger,
            'LoggerImplementation should be an instance of LoggerImplementation class.'
        );
    }

    public function testLogMethodExists()
    {
        $this->assertTrue(
            method_exists($this->logger, 'log'),
            'LoggerImplementation should have a log method.'
        );
    }

    public function testInfoMethodExists()
    {
        $this->assertTrue(
            method_exists($this->logger, 'info'),
            'LoggerImplementation should have an info method.'
        );
    }

    public function testWarningMethodExists()
    {
        $this->assertTrue(
            method_exists($this->logger, 'warning'),
            'LoggerImplementation should have a warning method.'
        );
    }

    public function testErrorMethodExists()
    {
        $this->assertTrue(
            method_exists($this->logger, 'error'),
            'LoggerImplementation should have an error method.'
        );
    }

    // Add more test cases for the log, info, warning, and error methods of the LoggerImplementation class
}
