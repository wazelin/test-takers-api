<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\RequestHandler;

use Wazelin\TestTakersApi\User\Business\Domain\UserSearchRequest;
use Wazelin\TestTakersApi\User\Business\Input\UserSearchInput;

class UserSearchRequestHandler
{
    public function handle(int $id): UserSearchInput
    {
        return new UserSearchInput(
            (new UserSearchRequest())->setId($id)
        );
    }
}
