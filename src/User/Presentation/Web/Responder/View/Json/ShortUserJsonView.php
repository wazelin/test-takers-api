<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\Responder\View\Json;

use JsonSerializable;
use Wazelin\TestTakersApi\User\Business\Domain\User;

class ShortUserJsonView implements JsonSerializable
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function jsonSerialize(): array
    {
        return [
            'userId' => $this->user->getId(),
            'firstName' => $this->user->getFirstName(),
            'lastName' => $this->user->getLastName(),
        ];
    }
}
