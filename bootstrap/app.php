<?php

use Cart\App;
use Cart\Middleware\OldInputMiddleware;
use Cart\Middleware\ValidationErrosMiddleware;
use Illuminate\Database\Capsule\Manager as Capsule;
use Slim\Views\Twig;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new App();

$container = $app->getContainer();

$capsule = new Capsule();
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cart',
    'username' => 'root',
    'password' => 'marek123',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

require __DIR__ . '/../src/routers.php';

$app->add( new ValidationErrosMiddleware($container->get(Twig::class)));
$app->add( new OldInputMiddleware($container->get(Twig::class)));