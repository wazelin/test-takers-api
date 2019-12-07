<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\DataAccess\DomainFactory;

use InvalidArgumentException;
use Wazelin\TestTakersApi\User\Business\Domain\User;

class UserFactory
{
    private GenderFactory $genderMapper;

    public function __construct(GenderFactory $genderMapper)
    {
        $this->genderMapper = $genderMapper;
    }

    /**
     * @param int $id
     * @param array $data
     *
     * @return User
     *
     * @throws InvalidArgumentException
     */
    public function create(int $id, array $data): User
    {
        return new User(
            $id,
            $data['login'],
            $data['password'],
            $data['title'],
            $data['firstname'],
            $data['lastname'],
            $this->genderMapper->create($data['gender']),
            $data['email'],
            $data['picture'],
            $data['address']
        );
    }
}
