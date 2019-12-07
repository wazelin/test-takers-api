<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\DataAccess\Repository;

use Wazelin\TestTakersApi\Core\Business\Domain\Exception\NotFoundException;
use Wazelin\TestTakersApi\User\Business\Contract\UserRepositoryInterface;
use Wazelin\TestTakersApi\User\Business\Domain\User;
use Wazelin\TestTakersApi\User\Business\Domain\UserSearchRequest;

class NoopUserSearchRepository implements UserRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function findOneOrFail(UserSearchRequest $searchRequest): User
    {
        throw NotFoundException::create('user');
    }
}
