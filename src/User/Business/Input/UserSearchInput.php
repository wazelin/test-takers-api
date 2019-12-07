<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Business\Input;

use Wazelin\TestTakersApi\User\Business\Domain\UserSearchRequest;

class UserSearchInput
{
    private UserSearchRequest $searchRequest;

    public function __construct(UserSearchRequest $searchRequest)
    {
        $this->searchRequest = $searchRequest;
    }

    public function getSearchRequest(): UserSearchRequest
    {
        return $this->searchRequest;
    }
}
