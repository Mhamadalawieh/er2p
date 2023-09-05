<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\AuthMiddlewareCommerce;
use Slim\Routing\RouteCollectorProxy;

// Exemple de la route avec ajout du Middleware
//$app->get('/', App\Controller\MainController::class . ':main')->add(new App\Middleware\AuthMiddleware());
$app->get('/', App\Controller\HomeController::class . ':main');

$app->get('/nous-contacter', App\Controller\ContactController::class . ':main');
$app->post('/nous-contacter/post', App\Controller\ContactController::class . ':postMessage');

$app->get('/qui-sommes-nous', App\Controller\UsController::class . ':main');


$app->get('/produit/1', App\Controller\ProductsController::class . ':product1');
$app->get('/produit/2', App\Controller\ProductsController::class . ':product2');
$app->get('/produit/3', App\Controller\ProductsController::class . ':product3');
$app->get('/produit/4', App\Controller\ProductsController::class . ':product4');




$app->get('/dashboard-er2p/connexion', App\Controller\AdminController::class . ':login');
$app->post('/dashboard-er2p/connexion/post', App\Controller\AdminController::class . ':postLogin');

$app->get('/dashboard-er2p/logout', App\Controller\AdminController::class . ':logout');





$app->group('/dashboard-er2p', function (RouteCollectorProxy $group) {
    $group->get('/accueil', App\Controller\AdminController::class . ':main');

    $group->get('/textes', App\Controller\AdminTextController::class . ':main');
    $group->post('/textes/get', App\Controller\AdminTextController::class . ':postGetText');
    $group->post('/textes/update', App\Controller\AdminTextController::class . ':postUpdateText');
    $group->post('/textes/add', App\Controller\AdminTextController::class . ':postAddText');
    $group->post('/textes/delete', App\Controller\AdminTextController::class . ':postDeleteText');

    $group->get('/images', App\Controller\AdminImageController::class . ':main');
    $group->post('/images/get', App\Controller\AdminImageController::class . ':postGetImage');
    $group->post('/images/update', App\Controller\AdminImageController::class . ':postUpdateImage');
    $group->post('/images/add', App\Controller\AdminImageController::class . ':postAddImage');
    $group->post('/images/delete', App\Controller\AdminImageController::class . ':postDeleteImage');

    $group->get('/actus', App\Controller\AdminNewsController::class . ':main');
    $group->post('/actus/add', App\Controller\AdminNewsController::class . ':postAddNews');
    $group->post('/actus/delete', App\Controller\AdminNewsController::class . ':postDeleteNews');

    $group->get('/personnalisation', App\Controller\AdminEditController::class . ':main');

    $group->get('/parametres', App\Controller\AdminSettingController::class . ':main');

//    $group->post('/search/post', App\Controller\SearchController::class . ':postSearch');


})->add(new AuthMiddleware());