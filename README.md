
    See english Description within `README-EN.md` file!

# Einstellungstest PHP Entwickler - TechDivision GmbH

* Dauer: 2,5 Stunden
* Programmiersprache: PHP
* Coding Standard: [PSR-12](http://www.php-fig.org/psr/psr-12/)

Die von dir erstellen oder angepassten Klassen bearbeitest und speicherst du direkt in dem von dir geklonten Git Fork des Repositories mit unserem Einstellungstest. Nach Fertigstellung committest du das gesamte Repository einschließlich deiner Dateien und pusht deine Änderungen zurück in deinen Fork. Sobald du fertig bist, gibst du uns Bescheid, so dass wir uns deine Lösung ansehen und bewerten können.

In unsere Bewertung fließen folgende Faktoren mit ein:

1. die Zeit, die du für die Fertigstellung benötigst (maximal 2,5 Stunden)
2. Qualität deiner Implementierung
3. Lauffähigkeit deiner Lösung
4. Korrekte Ausgaben auf der Konsole und in der Logdatei
5. Testabdeckung und Lauffähigkeit der Tests
6. Einhaltung des PSR-12 Standards

## Vorbereitung

Der Einstellungstest geht davon aus, dass du bereits über grundlegende Kenntnisse im Einsatz von Composer und PHPUnit verfügst. Der Einstellungstest besteht aus den folgenden Dateien

* dieser `README.md` Datei mit Informationen über den Ablauf
* einer `index.php` über die du die Anwendung ausführen kannst
* eine `composer.json` Composer Konfigurationsdatei
* einem src Verzeichnis mit den Klassen `TechDivision\LoggerInterface`, `TechDivision\LogLevel` und `TechDivision\Example`
* eine test Verzeichnis mit einer Klasse `TechDivision\ExampleTest`

Nachdem du dir den Einstellungstest erfolgreich über Bitbucket geklont hast, installierst du im ersten Schritt mit

```shell
cd recruiting-test-v1
composer install
```

das PHPUnit Framework und die CodeSniffer Bibliothek. Nachdem die Abhängigkeiten erfolgreich heruntergeladen und installiert wurden kannst du im Anschluß über den Aufruf von PHPUnit mit

```shell
vendor/bin/phpunit tests
```

die Lauffähigkeit deiner Testumgebung prüfen. Hierbei solltest du in etwa folgende Ausgabe erhalten

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

Der Test schlägt fehl, da die Methode `sortNames`, die in der Klasse `ExampleTest` getestet wird, noch nicht von dir implementiert wurde. Diese Methode soll im Rahmen des Einstellungstests von dir implementiert werden.

Anschließend kannst du mit

```shell
vendor/bin/phpcs --standard=PSR12 src tests
```

prüfen, ob die im Einstellungstest enthaltenen Klassen dem PSR-12 Standard entsprechen. Wenn du keine Ausgabe erhältst, dann ist alles o. k. und die Vorbereitungen für den Einstellungstest sind abgeschlossen. Du kannst nun mit der eigentlichen Aufgabenstellung weitermachen.

## Aufgabenstellung

In einem Kundenprojekt benötigen wir eine globale Logging Funktionalität. Hierzu sollen eine Abstrakte Basisklasse `TechDivision\AbstractLogger` und eine Klasse `TechDivision\LoggerImplementation` implementiert werden, die das Singleton Pattern verwendet.

Hast du bereits Erfahrung mit TDD kannst du entsprechende Tests zur Entwicklung nutzen. Hast du mit TDD noch keine Erfahrung, so kannst du die Unit Tests für die von dir zu entwickelnden Klassen `TechDivision\AbstractLogger` und `TechDivision\LoggerImplementation` natürlich auch im Anschluss, analog zur Testklasse `TechDivision\ExampleTest` erstellen.

Die von dir implementierten Klassen sollten dem PSR-12 Standard entsprechen. Hierzu wird neben PHPUnit auch der PHPCodeSniffer installiert, mit dem du prüfen kannst, ob du den Standard einhältst. 

### Abstrakte Basisklasse

Im ersten Schritt setzt du eine abstrakte Basisklasse, die das Interface `TechDivision\LoggerInterface` implementiert, um. Deine abstrakte Basisklasse deklariert hierbei eine geschützte, abstrakte Methode `log($logLevel, $message, $line = NULL)` die du dann, im nächsten Schritt, in deiner Logger Implementierung mit Leben füllst.

### Logger Implementierung + Singleton Entwurfsmuster

Nachdem du deine abstrakte Basisklasse fertig hast, nimmst du die tatsächliche Implementierung `TechDivision\LoggerImplementation`, die die Logging Ausgabe durch den Aufruf der geschützten Methode `log($logLevel, $message, $line = NULL)` an die in der php.ini konfigurierte Ausgabe schickt, vor. Hierzu verwendest du die Funktion [error_log](http://de.php.net/manual/de/function.error-log.php). Die Klasse soll das Singleton Entwurfsmuster sinnvoll einsetzen.

### Verwendung

Danach implementierst du die beiden Methoden `sortNames` und `renderNamesSorted` der Klasse `TechDivision\Example`, die den von dir zuvor implementierten Logger einsetzt. Deinen Logger initialisierst du bereits im Konstruktor der Klasse. Die Methoden-Stubs sind bereits in den Sourcen enthalten.

Hierbei setzt du die Methode `sortNames()` unter Zuhilfenahme der Funktion [usort](http://de.php.net/manual/de/function.usort.php) so um, dass das Konstruktor übergebene Array mit Namen, sortiert nach dem Nachnamen, auf der Konsole wie nachfolgend gezeigt, ausgegeben wird:

```shell
php index.php
Tim Wagner, Stefan Willkommer, Johann Zelger
```

Zusätzlich setzt du aus Debugging Zwecken den zuvor implementierten Logger ein, die Logging-Ausgabe soll folgendes Format haben:

```shell
TechDivision\Example[info] 2010-09-28 18:40:25 – line 25 Tim Wagner
TechDivision\Example[info] 2010-09-28 18:40:25 – line 25 Stefan Willkommer
TechDivision\Example[info] 2010-09-28 18:40:25 – line 25 Johann Zelger
```

### Unit Tests

Der Einstellungstest wird bereits mit einer Testklasse `TechDivision\ExampleTest` ausgeliefert. Dieser testet, ob du die Sortierung durch die Methode `sortNames` korrekt implementiert hast. Zusätzlich sollst du im Rahmen des Einstellungstests Tests für die Klassen `TechDivision\AbstractLogger` und `TechDivision\LoggerImplementation` schreiben. Nachdem du den Einstellungstest abgeschlossen hast, sollte die Ausführung der Tests in etwa folgende Ausgabe anzeigen

```shell
vendor/bin/phpunit tests
Tims-iMac:recruiting-test-v1 wagnert$ vendor/bin/phpunit tests
PHPUnit 9.2.6 by Sebastian Bergmann and contributors.

......                                                              6 / 6 (100%)

Time: 89 ms, Memory: 1.75Mb

OK (6 tests, 6 assertions)
```
