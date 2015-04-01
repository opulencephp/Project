v0.3.0
<hr>
* Updated to RDev 0.5.0
* In `bootstrap/console/start.php`, changed `$commands` to `$commandCollection`, set it to `$application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\CommandCollection")`
* Renamed `Project\Console\Commands\HelloWorld` to `Project\Console\Commands\HelloWorldCommand`
* Updated `configs/console/commands.php` to reflect `HelloWorldCommand` name change
* Renamed `Project\Console\HelloWorldTest` to `Project\Console\HelloWorldCommandTest`
* Added this changelog
* Added changelog to .gitattributes `export-ignore`