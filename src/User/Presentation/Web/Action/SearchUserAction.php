<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\Action;

use Psr\Http\Message\ResponseInterface;
use Wazelin\TestTakersApi\User\Business\Service\UserSearchService;
use Wazelin\TestTakersApi\User\Presentation\Web\RequestHandler\UserSearchRequestHandler;
use Wazelin\TestTakersApi\User\Presentation\Web\Responder\UserResponder;

class SearchUserAction
{
    private UserSearchRequestHandler $requestHandler;
    private UserSearchService $service;
    private UserResponder $responder;

    public function __construct(
        UserSearchRequestHandler $requestHandler,
        UserSearchService $service,
        UserResponder $responder
    ) {
        $this->requestHandler = $requestHandler;
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(int $id, ResponseInterface $response): ResponseInterface
    {
        $this->requestHandler->handle($id);

        return $this->responder->respond(
            $response,
            $this->service->findOneOrFail(
                $this->requestHandler->handle($id)
            )
        );
    }
}
