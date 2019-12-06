<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\Responder\View\Json;

use JsonSerializable;
use Wazelin\TestTakersApi\User\Business\Domain\User;

class UserJsonView implements JsonSerializable
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
            'login' => $this->user->getLogin(),
            'password' => $this->user->getPassword(),
            'title' => $this->user->getTitle(),
            'lastName' => $this->user->getLastName(),
            'firstName' => $this->user->getFirstName(),
            'gender' => (string)$this->user->getGender(),
            'email' => $this->user->getEmail(),
            'picture' => $this->user->getPictureUri(),
            'address' => $this->user->getAddress(),
        ];
    }
}
