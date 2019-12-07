<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Test\Unit\User\Presentation\Web\Responder\View\Json;

use JsonSerializable;

use Wazelin\TestTakersApi\User\Business\Domain\User;

use Wazelin\TestTakersApi\User\Presentation\Web\Responder\View\Json\UserJsonView;

/**
 * @covers \Wazelin\TestTakersApi\User\Presentation\Web\Responder\View\Json\UserJsonView
 */
class UserJsonViewTest extends UserJsonViewTestAbstract
{
    public function dataProvider(): array
    {
        return [
            [
                [
                    'userId' => 1,
                    'login' => 'test-login-1',
                    'password' => 'test-password-1',
                    'title' => 'test-title-1',
                    'lastName' => 'test-last-name-1',
                    'firstName' => 'test-first-name-1',
                    'gender' => 'female',
                    'email' => 'test-email-1',
                    'picture' => 'test-picture-1',
                    'address' => 'test-address-1',
                ],
                $this->createUserMock(
                    [
                        'getId' => 1,
                        'getLogin' => 'test-login-1',
                        'getPassword' => 'test-password-1',
                        'getTitle' => 'test-title-1',
                        'getLastName' => 'test-last-name-1',
                        'getFirstName' => 'test-first-name-1',
                        'getGender' => User\Gender::female(),
                        'getEmail' => 'test-email-1',
                        'getPictureUri' => 'test-picture-1',
                        'getAddress' => 'test-address-1',
                    ]
                ),
            ],
        ];
    }

    protected function createSut(User $user): JsonSerializable
    {
        return new UserJsonView($user);
    }
}
