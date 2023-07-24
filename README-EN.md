# Recruitment Test PHP Developer - TechDivision GmbH

* Test Duration: 2.5 hours
* Programming Language: PHP
* Coding Standard: [PSR-12](http://www.php-fig.org/psr/psr-12/)

Using the Repository Fork Clone from our Recruitment Test please save the Classes you have created or updated directly into this Repository.

After you have finished this Test, please commit the Repository including all files and push your changes to this Fork.
Please let us know as soon as you have completed the Test so as we can evaluate your Solution.

For our Evaluation the following Factors are to be considered:

1. The time you need to complete the Test (max. time frame is 2.5 hours)
2. Quality of Implementation
3. Does your Solution have the ability to run
4. Correct output within the console, and the log file
5. Successfully tested with the ability to run
6. Meeting with PSR-12 Standards

## Preparation

To pass the  Test we expected the Basic Skills how to use Tools like Composer and PHPUnit.

The Test contains following Files:

* The `README.md`  File containing the detailed Process Description how to use this Test
* The `index.php` File to run the Application
* The Composer Configuration file `composer.json` to install the required Test Tools PHPUnit and CodeSniffer
* The Folder `src` containing the Classes `TechDivision\LoggerInterface`, `TechDivision\LogLevel` and `TechDivision\Example`
* The Test Folder containing the Test Class `TechDivision\ExampleTest`

After you have cloned the Bitbucket Recruitment Test, please install at first the PHPUnit Framework und die CodeSniffer Bibliothek with the Composer using following Commands

```shell
cd recruiting-test-v1
composer install
```

After having installed the required dependencies  successfully, you will be able to make a Console call of PHPUnit using following Commands

```shell
vendor/bin/phpunit tests
```

To check the ability to run for your Application,  you should receive following Console Output

```shell
PHPUnit 9.2.6 by Sebastian Bergmann and contributors.

F                                                                   1 / 1 (100%)

Time: 57 ms, Memory: 1.50Mb

There was 1 failure:

1) TechDivision\ExampleTest::testSortNames
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
     0 => 'Tim Wagner'
-    1 => 'Stefan Willkommer'
-    2 => 'Johann Zelger'
+    1 => 'Johann Zelger'
+    2 => 'Stefan Willkommer'
 )

/Users/wagnert/Workspace/projects/recruiting-test-v1/tests/TechDivision/ExampleTest.php:53

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
```

This Test fails because of the missing Method `sortNames` that gets tested in the current Test Class `ExampleTest.php`. In the Context of this Test, the missing Method `sortNames` needs to be implemented

Please continue checking afterward using following Commands

```shell
vendor/bin/phpcs --standard=PSR12 src tests
```

Check if the existing Classes matches the PSR-12 Standard.
In a Case of a successfully passing Test, you will not get any output, and the Preparation for our Recruitment Test has completed. Please continue with the actual Assignment of Tasks.

## Assignment of Tasks

Based on a particular Customer Project we depend on a logging Functionality.
Therefore, we need to implement the Abstract Base Class `TechDivision\AbstractLogger` and the Class `TechDivision\LoggerImplementation` using the Singleton Pattern.

Depending on you experience with TDD (Test Driven Development) we would like to see you developing this Test using TDD.
Otherwise, you are allowed to create the Unit Tests for the required Classes `TechDivision\AbstractLogger` and `TechDivision\LoggerImplementation` afterward to follow-up accordingly to the Test Class `TechDivision\ExampleTest`.

The Classes you have implemented should meet the PSR-12 Standard.
Therefore, PHPUnit and PHPCodeSniffer need to be installed to check if you meet the Standard.

How can you investigate?

### Abstract Base Class

The first Step will be to implement an Abstract Class that represents the Interface `TechDivision\LoggerInterface`.
Your Abstract Class, therefore, declares a protected Abstract Method `log($logLevel, $message, $line = NULL)` what is used in our next Step to bring the Logger Implementation to live.

### Logger Implementierung + Singleton Pattern

After you have finished implementing the Abstract Base Class use the actual Implementation  `TechDivision\LoggerImplementation`
witch calls the protected Method `log($logLevel, $message, $line = NULL)` defined in the php.ini.
To fully benefit from the Singleton Pattern use the Function [error_log](http://de.php.net/manual/de/function.error-log.php).

### Usage

Implement the Class `TechDivision\Example` Methods `sortNames` and `renderNamesSorted` using the previously implemented Logger.
Your Logger gets already initialized in the Constructor of the Class. The provided Sources contain already existing Method Stubs therefore.

Utilize the method `sortNames()` using the Function [usort](http://de.php.net/manual/de/function.usort.php) and implement it in a way that the passed array, provided from the constructor, will be sorted bast on the last name, creating an output like the following example:

```shell
php index.php
Tim Wagner, Stefan Willkommer, Johann Zelger
```

for debugging purpose apply the previously created Logger to produce the following Output

```shell
TechDivision\Example[info] 2010-09-28 18:40:25 – line 25 Tim Wagner
TechDivision\Example[info] 2010-09-28 18:40:25 – line 25 Stefan Willkommer
TechDivision\Example[info] 2010-09-28 18:40:25 – line 25 Johann Zelger
```

### Unit Tests

The Recruitment Test contains already a Test Class named `TechDivision\ExampleTest`.
This Test checks the actual Implementation of the created Method `sortNames` with the required Functionality of sorting the passed Array.
In addition to the Recruitment Tests please write Tests for the Classes `TechDivision\AbstractLogger` and `TechDivision\LoggerImplementation`.
The Output after finishing these tests should look like the following lines:

```shell
vendor/bin/phpunit tests
Tims-iMac:recruiting-test-v1 wagnert$ vendor/bin/phpunit tests
PHPUnit 9.2.6 by Sebastian Bergmann and contributors.

......                                                              6 / 6 (100%)

Time: 89 ms, Memory: 1.75Mb

OK (6 tests, 6 assertions)
```
