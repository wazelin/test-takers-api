<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\DataAccess\DomainFactory;

use InvalidArgumentException;
use Wazelin\TestTakersApi\User\Business\Domain\User\Gender;

class GenderFactory
{
    private const RAW_DATA_FEMALE = 'female';
    private const RAW_DATE_MALE = 'male';

    /**
     * @param string $gender
     *
     * @return Gender
     *
     * @throws InvalidArgumentException
     */
    public function create(string $gender): Gender
    {
        switch ($gender) {
            case self::RAW_DATA_FEMALE:
                return Gender::female();
            case self::RAW_DATE_MALE:
                return Gender::male();
            default:
                throw new InvalidArgumentException("Cannot map $gender gender.");
        }
    }
}
