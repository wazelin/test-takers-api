<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User;

use Wazelin\TestTakersApi\User\Business\Contract\UserRepositoryInterface;

use Wazelin\TestTakersApi\User\DataAccess\Repository\NoopUserSearchRepository;

use function DI\create;

class UserDefinitions
{
    public static function get(): array
    {
        return [
            UserRepositoryInterface::class => create(NoopUserSearchRepository::class),
        ];
    }
}
