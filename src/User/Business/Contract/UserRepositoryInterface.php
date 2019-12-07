<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Business\Contract;

use Wazelin\TestTakersApi\Core\Business\Domain\Exception\NotFoundException;
use Wazelin\TestTakersApi\User\Business\Domain\User;
use Wazelin\TestTakersApi\User\Business\Domain\Users;
use Wazelin\TestTakersApi\User\Business\Domain\UserSearchRequest;

interface UserRepositoryInterface
{
    /**
     * @param UserSearchRequest $searchRequest
     *
     * @return User
     *
     * @throws NotFoundException
     */
    public function findOneOrFail(UserSearchRequest $searchRequest): User;

    /**
     * @param UserSearchRequest $searchRequest
     *
     * @return User[]
     */
    public function findAll(UserSearchRequest $searchRequest): array;
}
