<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\Responder\View\Json;

use JsonSerializable;
use Wazelin\TestTakersApi\User\Business\Domain\User;

class UsersJsonView implements JsonSerializable
{
    private array $users;

    public function __construct(User ...$users)
    {
        $this->users = $users;
    }

    public function jsonSerialize()
    {
        return array_map(fn(User $user) => new ShortUserJsonView($user), $this->users);
    }
}
