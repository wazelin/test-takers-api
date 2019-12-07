<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\DataAccess\Repository;

use Wazelin\TestTakersApi\User\Business\Contract\UserRepositoryInterface;
use Wazelin\TestTakersApi\User\Business\Domain\User;
use Wazelin\TestTakersApi\User\Business\Domain\UserSearchRequest;
use Wazelin\TestTakersApi\User\DataAccess\DomainFactory\UsersFactory;

use function array_filter;

class StaticUserSearchRepository implements UserRepositoryInterface
{
    private StaticUserJsonRepository $repository;
    private UsersFactory $factory;

    public function __construct(StaticUserJsonRepository $repository, UsersFactory $factory)
    {
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function find(UserSearchRequest $searchRequest): array
    {
        if ($searchRequest->hasId()) {
            return $searchRequest->getId() < 0 ? [] : $this->sliceUsers($searchRequest->getId(), 1);
        }

        if (!$searchRequest->hasName()) {
            return $this->sliceUsers($searchRequest->getOffset(), $searchRequest->getLimit());
        }

        $result = [];

        foreach ($this->sliceUsers($searchRequest->getOffset()) as $user) {
            if ($user->hasSimilarName($searchRequest->getName()))
            {
                $result[] = $user;
            }

            if (count($result) === $searchRequest->getLimit())
            {
                break;
            }
        }

        return $result;
    }

    /**
     * @param int $offset
     * @param int|null $limit
     *
     * @return User[]
     */
    private function sliceUsers(int $offset, int $limit = null): array
    {
        return $this->factory->create(array_slice($this->repository->findAll(), $offset, $limit, true));
    }
}
