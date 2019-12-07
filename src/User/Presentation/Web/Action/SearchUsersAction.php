<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wazelin\TestTakersApi\User\Business\Service\UserSearchService;
use Wazelin\TestTakersApi\User\Presentation\Web\RequestHandler\UsersSearchRequestHandler;
use Wazelin\TestTakersApi\User\Presentation\Web\Responder\UsersResponder;

class SearchUsersAction
{
    private UsersSearchRequestHandler $requestHandler;
    private UserSearchService $service;
    private UsersResponder $responder;

    public function __construct(
        UsersSearchRequestHandler $requestHandler,
        UserSearchService $service,
        UsersResponder $responder
    ) {
        $this->requestHandler = $requestHandler;
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->responder->respond(
            $response,
            ...$this->service->findAll(
                $this->requestHandler->handle($request)
            )
        );
    }
}
