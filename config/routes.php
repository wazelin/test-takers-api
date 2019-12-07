<?php declare(strict_types=1);

use Wazelin\TestTakersApi\User\Presentation\Web\Action\GetUserAction;

// `user` is not really RESTful in this case, but the resource name was defined like that in the API specs.
$app->get('/user/{id}', GetUserAction::class);
