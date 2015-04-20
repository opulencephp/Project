v0.3.0
<hr>
* Updated to RDev 0.5.0
* In `bootstrap/console/start.php`, changed:
    * `RDev\Console\Kernels\Kernel` to `RDev\Framework\Console\Kernel`
    * `$commands` to `$commandCollection`, set it to `$application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\CommandCollection")`
* In `bootstrap/http/start.php`, changed:
    * `RDev\HTTP\Kernels\Kernel` to `RDev\Framework\HTTP\Kernel`
    * `RDev\HTTP\Routing\Router` to `RDev\Routing\Router`
* Changed `Project\Bootstrappers\HTTP\Routing\Router` to `Project\Bootstrappers\Routing\Router`
* Changed all references to `RDev\HTTP\Routing` namespace to `RDev\Routing`
* Removed `session.php` and all mentions of sessions from `configs/application.php`
* Renamed `Project\Console\Commands\HelloWorld` to `Project\Console\Commands\HelloWorldCommand`
* Updated `configs/console/commands.php` to reflect `HelloWorldCommand` name change
* Renamed `Project\Console\HelloWorldTest` to `Project\Console\HelloWorldCommandTest`
* Added this changelog
* Added changelog to .gitattributes `export-ignore`