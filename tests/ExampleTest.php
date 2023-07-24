<?php

declare(strict_types=1);

namespace TechDivision;

use PHPUnit\Framework\TestCase;

/**
 * Test implementation for the Example class.
 *
 * @category   TechDivision
 * @subpackage Example
 * @copyright  2020 TechDivision GmbH <info@techdivision.com>
 * @author     Tim Wagner <t.wagner@techdivision.com>
 */
class ExampleTest extends TestCase
{
    /**
     * The example instance to test.
     *
     * @var Example
     */
    protected $example;

    /**
     *
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $this->example = new Example();
    }

    /**
     * Tests whether the method sorts the names
     * in the correct order or not.
     *
     * @return void
     */
    public function testSortNames(): void
    {

        // set the names that has to be sorted
        $this->example->setNames(array(
            'Tim Wagner',
            'Johann Zelger',
            'Stefan Willkommer'
        ));

        // sort the names by calling the method
        $this->example->sortNames();

        // assert that the sorting has been successful
        $this->assertEquals(array(
            'Tim Wagner',
            'Stefan Willkommer',
            'Johann Zelger'
        ), $this->example->getNames());
    }
}
