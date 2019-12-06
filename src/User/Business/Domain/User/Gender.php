<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Business\Domain\User;

class Gender
{
    private const MALE = 'male';
    private const FEMALE = 'female';

    private string $value;

    public static function male(): self
    {
        return new self(self::MALE);
    }

    public static function female(): self
    {
        return new self(self::FEMALE);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }
}
