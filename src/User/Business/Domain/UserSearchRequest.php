<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Business\Domain;

class UserSearchRequest
{
    private ?int $id;

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function hasId(): bool
    {
        return null !== $this->id;
    }
}
