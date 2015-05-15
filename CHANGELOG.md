v0.3.0
<hr>
* Updated to RDev 0.5.0
* Added `RDev\Framework\HTTP\Middleware\Session` to `configs/http/middleware.php`
* Added `Project\Bootstrappers\HTTP\Sessions\Session` bootstrapper, replaced `RDev\Framework\Bootstrappers\HTTP\Sessions\Session` bootstrapper in `configs/http/bootstrappers.php`
* Added `Project\Bootstrappers\HTTP\Views\Template` bootstrapper, replaced `RDev\Framework\Bootstrappers\HTTP\Views\Template` bootstrapper in `configs/http/bootstrappers.php`
* In `bootstrap/console/start.php`, changed:
    * `RDev\Console\Kernels\Kernel` to `RDev\Framework\Console\Kernel`
    * `$commands` to `$commandCollection`, set it to `$application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\CommandCollection")`
* In `bootstrap/http/start.php`, changed:
    * `RDev\HTTP\Kernels\Kernel` to `RDev\Framework\HTTP\Kernel`
    * `RDev\HTTP\Routing\Router` to `RDev\Routing\Router`
* Changed all references to `RDev\Databases\NoSQL\Memcached` namespace to `RDev\Memcached`
* Changed all references to `RDev\Databases\NoSQL\Redis` namespace to `RDev\Redis`
* Changed all references to `RDev\Databases\SQL` namespace to `RDev\Databases`
* Changed all references to `RDev\HTTP\Routing` namespace to `RDev\Routing`
* Changed `setMissedRouteControllerName()` to `setMissedRouteController()` in `app/project/bootstrappers/routing/Router.php`
* Removed `session.php` and all mentions of sessions from `configs/application.php`
* Renamed `Project\Console\Commands\HelloWorld` to `Project\Console\Commands\HelloWorldCommand`
* Updated `configs/console/commands.php` to reflect `HelloWorldCommand` name change
* Renamed `Project\Console\HelloWorldTest` to `Project\Console\HelloWorldCommandTest`
* Added this changelog
* Added changelog to .gitattributes `export-ignore`