<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Test\Unit\User\Presentation\Web\Responder\View\Json;

use JsonSerializable;

use Wazelin\TestTakersApi\User\Business\Domain\User;

use Wazelin\TestTakersApi\User\Presentation\Web\Responder\View\Json\ShortUserJsonView;

/**
 * @covers \Wazelin\TestTakersApi\User\Presentation\Web\Responder\View\Json\ShortUserJsonView
 */
class ShortUserJsonViewTest extends UserJsonViewTestAbstract
{
    public function dataProvider(): array
    {
        return [
            [
                [
                    'userId' => 1,
                    'firstName' => 'test-1-first',
                    'lastName' => 'test-1-last',
                ],
                $this->createUserMock(
                    [
                        'getId' => 1,
                        'getFirstName' => 'test-1-first',
                        'getLastName' => 'test-1-last',
                    ]
                ),
            ],
        ];
    }

    protected function createSut(User $user): JsonSerializable
    {
        return new ShortUserJsonView($user);
    }
}
