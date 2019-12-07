<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Business\Domain;

class UserSearchRequest
{
    private ?int $id;
    private ?string $name;
    private ?int $limit;
    private ?int $offset;

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

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function hasName(): bool
    {
        return null !== $this->name;
    }

    public function setLimit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function hasLimit(): bool
    {
        return null !== $this->limit;
    }

    public function setOffset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function hasOffset(): bool
    {
        return null !== $this->offset;
    }
}
