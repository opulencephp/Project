<h2>v0.6.13</h2>

<h3>Console</h3>
* Officially titled the console library "Apex"
* Renamed `opulence` file to `apex`

<h2>v0.6.12</h2>

<h3>Sessions</h3>
* Fixed `SessionBootstrapper` so that it respects cache client name

<h2>v0.6.11</h2>

<h3>Redis</h3>
* Updated `Project\Bootstrappers\Databases\RedisBootstrapper` to use latest `Opulence\Redis\Redis`
* Added `REDIS_DATABASE` environment variable

<h3>Sessions</h3>
* Added `cache.clientName` to `configs/http/sessions.php`
* Added client name parameter when making `MemcachedBridge` and `RedisBridge` for cache-backed sessions

<h2>v0.6.10</h2>

<h3>Environments</h3>
* Updated to latest changes in Opulence v0.6.14

<h2>v0.6.9</h2>

<h3>Bootstrappers</h3>
* Added `Opulence\Framework\Bootstrappers\PHP\PHPBootstrapper`
* Removed `setupcheck.php` call

<h3>Views</h3>
* Updated to use latest `ViewFactory::registerBuilder()` implementation

<h2>v0.6.8</h2>

<h3>General</h3>
* Switched to PSR-2

<h2>v0.6.7</h2>

<h3>Bootstrappers</h3>
* Removed unnecessary aliases

<h2>v0.6.6</h2>

<h3>Bootstrappers</h3>
* Added `Bootstrapper` suffix to all bootstrapper class names

<h2>v0.6.5</h2>

<h3>General</h3>
* Switched to PSR-2 spacing between `namespace` and `use` statements

<h2>v0.6.4</h2>

<h3>Environments</h3>
* Changed `Environment::getVariable()` and `setVariable()` to `getVar()` and `setVar()`, respectively

<h3>Logging</h3>
* Bound `Monolog\Logger` to the IoC container

<h2>v0.6.3</h2>

<h3>General</h3>
* Fixed various PHPDoc

<h3>Views</h3>
* Added "Builder" suffix to `ViewBuilder` classes
* Updated references of "template" to "view"

<h2>v0.6.2</h2>

<h3>General</h3>
* Removed "Edit" page to simplify the process of getting started

<h2>v0.6.1</h2>

<h3>General</h3>
* Removed unnecessary extensions in `ViewFactory` calls

<h2>v0.6.0</h2>

<h3>General</h3>
* Updated to Opulence (formerly RDev) 0.6
* Renamed console start file `rdev` to `opulence`

<h3>Bootstrappers</h3>
* Renamed `Project\Bootstrappers\HTTP\Views\Template` to `View` and `TemplateFunctions` to `ViewFunctions`

<h3>Views</h3>
* Updated references to `ITemplate`, `Template`, `TemplateFactory`, and `ITemplateFactory` to `IView`, `View`, `ViewFactory`, and `IViewFactory`, respectively

<h2>v0.5.7</h2>

<h3>Configs</h3>
* Removed an unnecessary boolean

<h2>v0.5.6</h2>

<h3>Configs</h3>
* Fixed an erroneous comment

<h2>v0.5.5</h2>

<h3>Configs</h3>
* Updated environment host classes to latest RDev

<h2>v0.5.4</h2>

<h3>Configs</h3>
* Updated environment config to latest RDev

<h2>v0.5.3</h2>

<h3>Routing</h3>
* Renamed `configs/http/routing.php` to `routes.php`
* Added `configs/http/routing.php` to hold router settings
* Added caching ability to `Project\Bootstrappers\HTTP\Routing\Router`

<h2>v0.5.2</h2>

<h3>Events</h3>
* Removed `app/project/events/events` directory (event classes should just go in `app/project/events`

<h2>v0.5.1</h2>

<h3>Events</h3>
* Added `Project\Bootstrappers\Events\Dispatcher`
* Added `app/project/events/events` and `app/project/events/listeners` directories
* Added `configs/events.php`
* Added `Dispatcher::class` to `configs/bootstrappers.php`

<h2>v0.5.0</h2>

<h3>General</h3>
* Updated to RDev 0.5.0
* Jumped to version 0.5.0 to match RDev version
* Added this changelog
* Added `bootstrap/configureBootstrappers.php`
* Added changelog to .gitattributes `export-ignore`
* Moved tmp/http/* to tmp/framework/http/*
* Added tmp/framework/console

<h3>Configs</h3>
* Added `configs/tasks.php`
* Added `tmp.framework.console` to `configs/paths.php`
* Added `tmp.framework.http` to `configs/paths.php`
* Renamed `compiledViews` path in `configs/paths.php` to `views.compiled`
* Renamed `views` path in `configs/paths.php` to `views.raw`

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
  
<h3>Logging</h3>
* Split `configs/logging.php` into kernel-specific configs:  `configs/console/logging.php` and `configs/http/logging.php`
  
<h3>Routing</h3>
* Changed all references to `RDev\HTTP\Routing` namespace to `RDev\Routing`
* Moved "controller" option out of array into the second parameter in `Router` methods
* Changed `setMissedRouteControllerName()` to `setMissedRouteController()` in `app/project/bootstrappers/http/routing/Router.php`

<h3>Sessions</h3>
* Removed `session.php` and all mentions of sessions from `configs/application.php`
* Aded `configs/http/sessions.php`
* Added `RDev\Framework\HTTP\Middleware\Session` to `configs/http/middleware.php`
* Added `Project\Bootstrappers\HTTP\Sessions\Session` bootstrapper, replaced `RDev\Framework\Bootstrappers\HTTP\Sessions\Session` bootstrapper with it in `configs/console/bootstrappers.php` and `configs/http/bootstrappers.php`
* Added `Project\HTTP\Middleware\CheckCSRFToken` class

<h3>Templates</h3>
* Added `Project\Bootstrappers\HTTP\Views\Template` bootstrapper, replaced `RDev\Framework\Bootstrappers\HTTP\Views\Template` bootstrapper in `configs/http/bootstrappers.php`
* Updated the following config settings in `configs/http/views.php`:
  * `cacheLifetime` renamed to `cache.lifetime`
  * `gcChance` renamed to `gc.chance`
  * `gcTotal` renamed to `gc.divisor`

<h3>Tests</h3>
* Added `Project\HTTP\ApplicationTestCase::getGlobalMiddleware()`