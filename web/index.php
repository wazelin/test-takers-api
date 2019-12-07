<?php declare(strict_types=1);

use DI\Bridge\Slim\Bridge;
use DI\Container;

require dirname(__DIR__) . '/vendor/autoload.php';

/** @var Container $container */
$container = require dirname(__DIR__) . '/config/container.php';

$app = Bridge::create($container);

require dirname(__DIR__) . '/config/middleware.php';
require dirname(__DIR__) . '/config/routes.php';

$app->run();
