<?php
use Phalcon\Di\FactoryDefault;

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * Read services
 */
include APP_PATH . "/app/config/services.php";

/**
 * Call the autoloader service.  We don't need to keep the results.
 */
$di->getLoader();

(new \Phalcon\Debug())->listen();

/**
 * Handle the request
 */
$application = new \Phalcon\Mvc\Application($di);

echo $application->handle()->getContent();
