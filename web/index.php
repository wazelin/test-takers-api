<?php declare(strict_types=1);

use DI\Bridge\Slim\Bridge;

require __DIR__ . '/../vendor/autoload.php';

$app = Bridge::create();

$app->addErrorMiddleware(true, true, true);

require dirname(__DIR__) . '/config/routes.php';

$app->run();
