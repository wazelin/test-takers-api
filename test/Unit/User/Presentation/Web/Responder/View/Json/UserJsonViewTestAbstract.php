<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Test\Unit\User\Presentation\Web\Responder\View\Json;

use JsonSerializable;
use PHPUnit\Framework\TestCase;
use Wazelin\TestTakersApi\User\Business\Domain\User;

use function json_encode;

abstract class UserJsonViewTestAbstract extends TestCase
{
    abstract public function dataProvider(): array;

    /**
     * @dataProvider dataProvider
     *
     * @param array $expected
     * @param User $user
     */
    public function testJsonSerialize(array $expected, User $user): void
    {
        $this->assertJsonStringEqualsJsonString(json_encode($expected), json_encode($this->createSut($user)));
    }

    abstract protected function createSut(User $user): JsonSerializable;

    protected function createUserMock(array $accessorToValueMap): User
    {
        $user = $this->createMock(User::class);

        foreach ($accessorToValueMap as $method => $value) {
            $user
                ->expects(static::once())
                ->method($method)
                ->willReturn($value);
        }

        return $user;
    }
}
