<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Test\Api\User;

use Codeception\Util\HttpCode;
use Wazelin\TestTakersApi\Test\ApiTester;

class SearchUserCest
{
    public function testFoundUser(ApiTester $I): void
    {
        $I->sendGET('/user/0');

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseContainsJson(
            [
                'userId' => 0,
                'login' => 'fosterabigail',
                'password' => 'P7ghvUQJNr6myOEP',
                'title' => 'mrs',
                'lastName' => 'foster',
                'firstName' => 'abigail',
                'gender' => 'female',
                'email' => 'abigail.foster60@example.com',
                'picture' => 'https://api.randomuser.me/0.2/portraits/women/10.jpg',
                'address' => '1851 saddle dr anna 69319',
            ]
        );
    }

    public function testNotFoundUser(ApiTester $I): void
    {
        $I->sendGET('/user/-1');

        $I->seeResponseCodeIs(HttpCode::NOT_FOUND);
    }
}
