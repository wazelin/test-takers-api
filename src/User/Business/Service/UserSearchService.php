<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Business\Service;

use Wazelin\TestTakersApi\Core\Business\Domain\Exception\NotFoundException;
use Wazelin\TestTakersApi\User\Business\Contract\UserRepositoryInterface;
use Wazelin\TestTakersApi\User\Business\Domain\User;
use Wazelin\TestTakersApi\User\Business\Input\UserSearchInput;

class UserSearchService
{
    private UserRepositoryInterface $repository;

    /**
     * @param UserRepositoryInterface $repository
     *
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param UserSearchInput $input
     *
     * @return User
     *
     * @throws NotFoundException
     */
    public function findOneOrFail(UserSearchInput $input): User
    {
        return $this->repository->findOneOrFail(
            $input->getSearchRequest()
        );
    }
}
