<h2>v1.0.0-beta6</h2>

<h3>General</h3>
* Updated files to use `Opulence\Ioc\Bootstrappers` rather than `Opulence\Bootstrappers`

<h3>Config</h3>
* Completely rewrote the way bootstrappers are run by the application
* Added lots of uses of `Opulence\Framework\Configuration\Config`

<h3>Sessions</h3>
* Added a few new environment variables for session handlers and cookies

<h2>v1.0.0-beta5</h2>

<h3>General</h3>
* Fixed `ENCRYPTION_KEY` environment var that's set when running PHPUnit tests

<h2>v1.0.0-beta4</h2>

<h3>General</h3>
* Since the encryption library has been refactored to provide greater security, the encryption key byte length has been raised from 16 to 32 bytes
  * Run `php apex encryption:generatekey` to create a new, suitably-long encryption key after updating
* Updated names of various dispatcher classes to a more descriptive `{Model}Dispatcher`

<h3>Config</h3>
* In `config/application.php`:
  * Updated `Opulence\Applications\Tasks\Dispatchers\IDispatcher as ITaskDispatcher` to `Opulence\Applications\Tasks\Dispatchers\ITaskDispatcher`
  * Updated `Opulence\Bootstrappers\Dispatchers\IDispatcher as IBootstrapperDispatcher` to `Opulence\Bootstrappers\Dispatchers\IBootstrapperDispatcher`
  * Updated `Opulence\Bootstrappers\Dispatchers\Dispatcher as BootstrapperDispatcher` to `Opulence\Bootstrappers\Dispatchers\BootstrapperDispatcher`
* In `config/bootstrappers.php`:
  * Updated `use Project\Application\Bootstrappers\Events\DispatcherBootstrapper;` to `use Project\Application\Bootstrappers\Events\EventDispatcherBootstrapper;`
* In `config/tasks.php`:
  * Updated `Opulence\Applications\Tasks\Dispatchers\Dispatcher` to `Opulence\Applications\Tasks\Dispatchers\TaskDispatcher`
  
<h3>Bootstrappers</h3>
* Updated `Project\Application\Bootstrappers\Events\DispatcherBootstrapper` to `EventDispatcherBootstrapper`
  * Also updated `use Opulence\Framework\Events\Bootstrappers\DispatcherBootstrapper as BaseBootstrapper;` to `use Opulence\Framework\Events\Bootstrappers\EventDispatcherBootstrapper as BaseBootstrapper;`

<h2>v1.0.0-beta3</h2>

<h3>Environments</h3>
* Made the default environment "development" rather than "production"
* Removed unnecessary "CLIENT_ID" from environment
* Added "ENV_NAME" rather than relying on resolvers to detect the host

<h2>v1.0.0-beta2</h2>

<h3>General</h3>
* Fixed installation scripts

<h3>Tests</h3>
* Incremented PHPUnit version from 5.2 to 5.4

<h2>v1.0.0-beta1</h2>

<h3>General</h3>
* First beta

<h2>v1.0.0-alpha24</h2>

<h3>Bootstrappers</h3>
* Updated all bootstrappers to use new namespaces in Opulence v1.0.0-alpha36

<h3>Http</h3>
* Updated all middleware to use new namespaces in Opulence v1.0.0-alpha36

<h2>v1.0.0-alpha23</h2>

<h3>General</h3>
* Updated to PHP 7
* Updated to PHPUnit 5.2
* Restructured directories to better match with domain-driven design philosophy
  * Added `Application`, `Domain`, and `Infrastructure` directories under `src/Project`

<h3>Bootstrappers</h3>
* Updated to use the new IoC container (see below)
* Updated `Project\Application\Bootstrappers\Http\Session\SessionBootstrapper` to inject an `Opulence\Session\Handlers\ISessionEncrypter` encrypter if the session is using encryption (formerly was using Opulence's cryptography library) 

<h3>IoC</h3>
* Completely rewrote the container, which is not backwards-compatible
* Please refer to Opulence changelog to see what changed

<h3>Views</h3>
* Updated calls to `ViewFactory::create()` to `createView()`

<h2>v1.0.0-alpha22</h2>

<h3>Validation</h3>
* Added `resources/lang/en/validation.php`
* Added `resources.lang` and `resources.lang.en` to `config/paths.php`
* Added `Project\Bootstrappers\Validation\ValidatorBootstrapper`

<h3>Views</h3>
* Moved `resources/views/errors` to `resources/views/errors/html`
* Added `resources/views/errors/json` and views under that directory

<h2>v1.0.0-alpha21</h2>

<h3>Testing</h3>
* Renamed all `ApplicationTestCase` instances to `IntegrationTestCase`

<h2>v1.0.0-alpha20</h2>

<h3>Testing</h3>
* Updated console syntax

<h2>v1.0.0-alpha19</h2>

<h3>Bootstrappers</h3>
* Removed `Opulence\Framework\Bootstrappers\Php\PhpBootstrapper`
* Renamed `Project\Bootstrappers\Databases\RedisBootstrapper` to `Project\Bootstrappers\Cache\RedisBootstrapper`

<h3>Middleware</h3>
* Added `Opulence\Framework\Http\Middleware\CheckMaintenanceMode` to global middleware in `config/http/middleware.php`

<h3>Views</h3>
* Added `resources/views/errors/503.fortune.php`

<h2>v1.0.0-alpha18</h2>

<h3>General</h3>
* Fixed typos

<h2>v1.0.0-alpha17</h2>

<h3>Testing</h3>
* Updated HTTP tests to use `RequestBuilder` rather than call `route()` directly

<h2>v1.0.0-alpha16</h2>

<h3>ORM</h3>
* Added support for Id generators in the unit of work

<h3>Session</h3>
* Updated calls to include target for `Container::makeShared()` in `Project\Bootstrappers\Http\Sessions::getCacheBridge()` 

<h2>v1.0.0-alpha15</h2>

<h3>Views</h3>
* Fixed formatting of `resources/views/Home.fortune.php`
* Bound `Opulence\Orm\IUnitOfWork` rather than `UnitOfWork`

<h2>v1.0.0-alpha14</h2>

<h3>Debug</h3>
* Added `LoggerInterface` to `ErrorHandler`

<h2>v1.0.0-alpha13</h2>

<h3>Environments</h3>
* Moved `Opulence\Applications\Environments` to its own library `Opulence\Environments`

<h2>v1.0.0-alpha12</h2>

<h3>Views</h3>
* Improved formatting of exceptions

<h2>v1.0.0-alpha11</h2>

<h2>PHPUnit</h2>
* Re-added `phpunit.xml`

<h2>v1.0.0-alpha10</h2>

<h3>Configs</h3>
* Changed `/configs` to `/config`
* Added `/config/exceptions.php` and `/config/errors.php`

<h3>HTTP</h3>
* Changed HTTP kernel to use exception handlers and renderers rather than loggers

<h2>v1.0.0-alpha9</h2>

<h3>Bootstrap</h3>
* Changed `Opulence\Applications\Application::shutdown()` to `shutDown()`

<h3>Configs</h3>
* Changed `Opulence\Applications\Paths` to `Opulence\Bootstrappers\Paths`

<h2>v1.0.0-alpha8</h2>

<h3>General</h3>
* Added develop branch
* Renamed `/app` directory to `/src`
* Renamed `/tests/app` directory to `/tests/src`

<h3>Databases</h3>
* Added `TypeMapperFactory` binding to `SqlBootstrapper`
 
<h3>Redis</h3>
* Added `TypeMapper` binding to `RedisBootstrapper`
* Removed `TypeMapper` from `Opulence\Redis\Redis::__construct()`

<h2>v1.0.0-alpha7</h2>

<h3>Bootstrappers</h3>
* Changed `Opulence\Applications\Bootstrappers` namespace to `Opulence\Bootstrappers`

<h2>v1.0.0-alpha6</h2>

<h3>Applications</h3>
* Removed `Application::getIocContainer()` and `Application::getPaths()` calls

<h3>Testing</h3>
* Updated `ApplicationTestCase::setApplication()` to `setApplicationAndIocContainer()`

<h2>v1.0.0-alpha5</h2>

<h3>General</h3>
* Changed formatting of PHPDoc
* Changed capitalization of namespace/class name/variable acronyms to follow pascal case
* Changed all directory names to match namespace capitalization

<h2>v1.0.0-alpha4</h2>

<h3>Tests</h3>
* Updated references from `Opulence\Framework\Tests` to `Opulence\Framework\Testing\PHPUnit`

<h2>v1.0.0-alpha3</h2>

<h3>Views</h3>
* Changed wording on homepage
* Changed all views to have `.fortune.php` extensions

<h2>v1.0.0-alpha2</h2>

<h3>ORM</h3>
* Updated `UnitOfWorkBootstrapper` to use changes in Opulence v1.0.0-alpha3

<h2>v1.0.0-alpha1</h2>

<h3>General</h3>
* Created first alpha release
* Updated Composer configs to latest branch

<h2>v0.6.15</h2>

<h3>General</h3>
* Fixed bad "use" statement in `configs/application.php`

<h2>v0.6.14</h2>

<h3>Databases</h3>
* Updated connection pools to use latest `Opulence\Databases\ConnectionPools` namespace (Opulence v0.6.17)

<h3>Views</h3>
* Updated `ViewBootstrapper` to instantiate `FileCache` class, not `Cache`
* Removed `$fileSystem` parameter from `FileCache`

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