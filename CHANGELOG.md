<h2>v0.5.0</h2>

<h3>General</h3>
* Updated to RDev 0.5.0
* Jumped to version 0.5.0 to match RDev version
* Added this changelog
* Added `bootstrap/configureBootstrappers.php`
* Added changelog to .gitattributes `export-ignore`
* Moved tmp/http/* to tmp/framework/http/*
* Added tmp/framework/console

<h3>Bootstrappers</h3>
* Added code to register and dispatch bootstrappers in `bootstrap/configureBootstrappers.php`

<h3>Configs</h3>
* Added `tmp.framework.console` to `configs/paths.php`
* Added `tmp.framework.http` to `configs/paths.php`
* Renamed `compiledViews` path in `configs/paths.php` to `views.compiled`

<h3>Console</h3>
* Renamed `RDev\Console\Commands\Commands` to `RDev\Console\Commands\CommandCollection`
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
* Moved "controller" option out of array into the second parameter in `Router` methods
* Changed `setMissedRouteControllerName()` to `setMissedRouteController()` in `app/project/bootstrappers/http/routing/Router.php`

<h3>Sessions</h3>
* Removed `session.php` and all mentions of sessions from `configs/application.php`
* Aded `configs/http/sessions.php`
* Added `RDev\Framework\HTTP\Middleware\Session` to `configs/http/middleware.php`
* Added `Project\Bootstrappers\HTTP\Sessions\Session` bootstrapper, replaced `RDev\Framework\Bootstrappers\HTTP\Sessions\Session` bootstrapper with it in `configs/console/bootstrappers.php` and `configs/http/bootstrappers.php`

<h3>Templates</h3>
* Added `Project\Bootstrappers\HTTP\Views\Template` bootstrapper, replaced `RDev\Framework\Bootstrappers\HTTP\Views\Template` bootstrapper in `configs/http/bootstrappers.php`
* Updated the following config settings in `configs/http/views.php`:
  * `cacheLifetime` renamed to `cache.lifetime`
  * `gcChance` renamed to `gc.chance`
  * `gcTotal` renamed to `gc.divisor`

<h3>Tests</h3>
* Added `Project\HTTP\ApplicationTestCase::getGlobalMiddleware()`