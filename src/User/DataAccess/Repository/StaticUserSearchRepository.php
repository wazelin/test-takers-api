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
            return $searchRequest->getId() < 0 ? [] : $this->sliceUsers(1, $searchRequest->getId());
        }

        $usersSlice = $this->sliceUsers($searchRequest->getLimit(), $searchRequest->getOffset());

        if (!$searchRequest->hasName()) {
            return $usersSlice;
        }

        return array_filter(
            $usersSlice,
            static function (User $user) use ($searchRequest): bool {
                return $user->hasSimilarName($searchRequest->getName());
            }
        );
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return User[]
     */
    private function sliceUsers(int $limit, int $offset): array
    {
        return $this->factory->create(array_slice($this->repository->findAll(), $offset, $limit, true));
    }
}
