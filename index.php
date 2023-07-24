<?php

// load the composer autoloader
require 'vendor/autoload.php';

// create an array with names to be sorted
$names = array('Tim Wagner', 'Johann Zelger', 'Stefan Willkommer');

// render the sorted names
// $example = new TechDivision\Example($names);
// $example->renderNamesSorted();


// $example = new TechDivision\Example($names);
// $example->sortNames();
// $example->renderNamesSorted();



$logger = new TechDivision\Logger();

$example = new TechDivision\Example($names);
$example->setLogger($logger);
$example->sortNames();
$example->renderNamesSorted();
