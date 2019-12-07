<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Business\Contract;

use Wazelin\TestTakersApi\User\Business\Domain\User;
use Wazelin\TestTakersApi\User\Business\Domain\UserSearchRequest;

interface UserRepositoryInterface
{
    /**
     * @param UserSearchRequest $searchRequest
     *
     * @return User[]
     */
    public function find(UserSearchRequest $searchRequest): array;
}
