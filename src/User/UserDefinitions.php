<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User;

use Wazelin\TestTakersApi\User\Business\Service\UserSearchService;
use Wazelin\TestTakersApi\User\DataAccess\Repository\StaticUserJsonRepository;
use Wazelin\TestTakersApi\User\DataAccess\Repository\StaticUserSearchRepository;

use function DI\create;
use function DI\get;

class UserDefinitions
{
    public static function get(): array
    {
        return [
            UserSearchService::class => create()->constructor(get(StaticUserSearchRepository::class)),
            StaticUserJsonRepository::class => create()->constructor(get('user.data_source.json')),
        ];
    }
}
