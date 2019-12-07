<?php declare(strict_types=1);

use Wazelin\TestTakersApi\Core\Presentation\Web\Middleware\ExceptionHandlerMiddleware;

$app
    ->add($container->get(ExceptionHandlerMiddleware::class))
    ->addErrorMiddleware(true, true, true);
