<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\DataAccess\Repository;

use Wazelin\TestTakersApi\User\Business\Contract\UserRepositoryInterface;
use Wazelin\TestTakersApi\User\Business\Domain\UserSearchRequest;

class NoopUserSearchRepository implements UserRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function find(UserSearchRequest $searchRequest): array
    {
        return [];
    }
}
