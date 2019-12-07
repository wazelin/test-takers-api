<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\DataAccess\DomainFactory;

use InvalidArgumentException;
use Wazelin\TestTakersApi\User\Business\Domain\User;

class UsersFactory
{
    private UserFactory $userFactory;

    public function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    /**
     * @param array $data Mapped by ID
     *
     * @return User[]
     *
     * @throws InvalidArgumentException
     */
    public function create(array $data): array
    {
        $result = [];

        foreach ($data as $id => $datum)
        {
            $result[] = $this->userFactory->create($id, $datum);
        }

        return $result;
    }
}
