<h2>v0.3.0</h2>

<h3>General</h3>
* Updated to RDev 0.5.0
* Jumped to version 0.5.0 to match RDev version
* Added this changelog
* Added changelog to .gitattributes `export-ignore`

<h3>Console</h3>
* In `bootstrap/console/start.php`, changed:
  * `RDev\Console\Kernels\Kernel` to `RDev\Framework\Console\Kernel`
  * `$commands` to `$commandCollection`, set it to `$application->getIoCContainer()->makeShared("RDev\\Console\\Commands\\CommandCollection")`
* Renamed `Project\Console\Commands\HelloWorld` to `Project\Console\Commands\HelloWorldCommand`
* Updated `configs/console/commands.php` to reflect `HelloWorldCommand` name change
* Renamed `Project\Console\HelloWorldTest` to `Project\Console\HelloWorldCommandTest`
  
<h3>Databases</h3>
* Changed all references to `RDev\Databases\NoSQL\Memcached` namespace to `RDev\Memcached`
* Changed all references to `RDev\Databases\NoSQL\Redis` namespace to `RDev\Redis`
* Changed all references to `RDev\Databases\SQL` namespace to `RDev\Databases`
  
<h3>Environment</h3>
* Added "SESSION_DRIVER" environment variable

<h3>HTTP</h3>
* In `bootstrap/http/start.php`, changed:
  * `RDev\HTTP\Kernels\Kernel` to `RDev\Framework\HTTP\Kernel`
  * `RDev\HTTP\Routing\Router` to `RDev\Routing\Router`
  
<h3>Routing</h3>
* Changed all references to `RDev\HTTP\Routing` namespace to `RDev\Routing`
* Changed `setMissedRouteControllerName()` to `setMissedRouteController()` in `app/project/bootstrappers/routing/Router.php`

<h3>Sessions</h3>
* Removed `session.php` and all mentions of sessions from `configs/application.php`
* Added `RDev\Framework\HTTP\Middleware\Session` to `configs/http/middleware.php`
* Added `Project\Bootstrappers\HTTP\Sessions\Session` bootstrapper, replaced `RDev\Framework\Bootstrappers\HTTP\Sessions\Session` bootstrapper in `configs/http/bootstrappers.php`

<h3>Templates</h3>
* Added `Project\Bootstrappers\HTTP\Views\Template` bootstrapper, replaced `RDev\Framework\Bootstrappers\HTTP\Views\Template` bootstrapper in `configs/http/bootstrappers.php`