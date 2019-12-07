<?php declare(strict_types=1);

use DI\ContainerBuilder;
use Wazelin\TestTakersApi\User\UserDefinitions;

$containerBuilder = new ContainerBuilder();

return $containerBuilder
    ->addDefinitions(UserDefinitions::get())
    ->build();
