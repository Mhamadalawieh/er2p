<?php

use DI\Container;
//use Slim\Csrf\Guard;
use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

// .env
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');


// create container system with PHP-DI
$container = new Container();

// register custom container
require __DIR__ . '/../config/containers.php';

// register container into app
AppFactory::setContainer($container);

// create slim application
$app = AppFactory::create();

$responseFactory = $app->getResponseFactory();

// Register Middleware On Container
//$container->set('csrf', function () use ($responseFactory) {
//    $GLOBALS['guard'] = new Guard($responseFactory);
//    return $GLOBALS['guard'];
//});

$app->getContainer()->get('db');

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Add MethodOverride middleware
$methodOverrideMiddleware = new MethodOverrideMiddleware();
$app->add($methodOverrideMiddleware);

// Register Middleware To Be Executed On All Routes
//$app->add('csrf');

// register routes in app
require __DIR__ . '/../config/routes.php';

// start application
$app->run();