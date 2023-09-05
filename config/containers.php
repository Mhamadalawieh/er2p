<?php

//use App\Extensions\CsrfExtension;
use FFMpeg\FFMpeg;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// twig container
$container->set('twig', function() {
    $loader = new FilesystemLoader(__DIR__ . $_ENV['TEMPLATE_PATH']);
    $twig = new Environment($loader, [
        'cache' => ($_ENV['ENV'] == 'prod') ? __DIR__ . $_ENV['CACHE_PATH'] : false,
    ]);
//    $twig->addExtension(new CsrfExtension($GLOBALS['guard']));
    if(isset($_SESSION['features']))
    {
        $twig->addGlobal('features', $_SESSION['features']);
    }

    return $twig;
});

// db container
$container->set('db', function() {
    $capsule = new Illuminate\Database\Capsule\Manager();
    $capsule->addConnection([
        'driver'    => $_ENV['DB_DRIVER'],
        'host'      => $_ENV['DB_HOST'],
        'database'  => $_ENV['DB_NAME'],
        'username'  => $_ENV['DB_USER'],
        'password'  => $_ENV['DB_PASSWORD'],
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container()));

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});

// Container for logs
$container->set('logger', function() {
    $logger = new Logger('app');
    $logger->pushHandler(new StreamHandler(__DIR__ . $_ENV['LOG_PATH'], Logger::INFO));
    $logger->pushHandler(new StreamHandler(__DIR__ . $_ENV['LOG_PATH'], Logger::WARNING));
    $logger->pushHandler(new StreamHandler(__DIR__ . $_ENV['LOG_PATH'], Logger::ERROR));
    $logger->pushHandler(new FirePHPHandler());
    return $logger;
});


// FFMPEG container
$container->set('ffmpeg', function () {
    return FFMpeg::create();
});

$container->set('messaging', function () {
    return $GLOBALS['factory']->createMessaging();
});
