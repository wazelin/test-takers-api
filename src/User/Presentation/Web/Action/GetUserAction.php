<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\Action;

use Psr\Http\Message\ResponseInterface;

class GetUserAction
{
    public function __invoke(ResponseInterface $response): ResponseInterface
    {
        $response->getBody()->write(__CLASS__);

        return $response;
    }
}
