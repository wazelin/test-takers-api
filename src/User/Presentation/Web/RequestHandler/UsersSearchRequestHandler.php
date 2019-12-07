<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\RequestHandler;

use Psr\Http\Message\ServerRequestInterface;
use Wazelin\TestTakersApi\Core\Presentation\Web\RequestHandler\Assert;
use Wazelin\TestTakersApi\User\Business\Domain\UserSearchRequest;
use Wazelin\TestTakersApi\User\Business\Input\UserSearchInput;

class UsersSearchRequestHandler
{
    public function handle(ServerRequestInterface $request): UserSearchInput
    {
        return new UserSearchInput(
            $this->createSearchRequest($request)
        );
    }

    private function createSearchRequest(ServerRequestInterface $request): UserSearchRequest
    {
        $searchRequest = new UserSearchRequest();

        $requestQueryParameters = $request->getQueryParams();

        if (!empty($requestQueryParameters['name'])) {
            $searchRequest->setName($requestQueryParameters['name']);
        }

        if (isset($requestQueryParameters['limit'])) {
            Assert::integerish($requestQueryParameters['limit'], 'Limit must be an integer value.');
            Assert::greaterThan($requestQueryParameters['limit'], 0, 'Limit must be an positive integer value.');

            $searchRequest->setLimit((int)$requestQueryParameters['limit']);
        }

        if (isset($requestQueryParameters['offset'])) {
            Assert::integerish($requestQueryParameters['offset'], 'Limit must be an integer value.');
            Assert::greaterThan($requestQueryParameters['offset'], 0, 'Limit must be an positive integer value.');

            $searchRequest->setOffset((int)$requestQueryParameters['offset']);
        }

        return $searchRequest;
    }
}
