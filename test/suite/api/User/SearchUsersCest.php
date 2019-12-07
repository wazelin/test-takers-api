<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Test\Api\User;

use Codeception\Util\HttpCode;
use Wazelin\TestTakersApi\Test\ApiTester;

class SearchUsersCest
{
    public function testListUsers(ApiTester $I): void
    {
        $I->sendGET('/users?limit=1');

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseContainsJson(
            [
                [
                    'userId' => 0,
                    'firstName' => 'abigail',
                    'lastName' => 'foster',
                ]
            ]
        );
    }
    public function testListUsersWithOffset(ApiTester $I): void
    {
        $I->sendGET('/users?limit=1&offset=1');

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseContainsJson(
            [
                [
                    'userId' => 1,
                    'firstName' => 'allison',
                    'lastName' => 'graham',
                ]
            ]
        );
    }

    public function testListUsersByFirstName(ApiTester $I): void
    {
        $I->sendGET('/users?limit=1&name=clark');

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseContainsJson(
            [
                [
                    'userId' => 2,
                    'firstName' => 'susan',
                    'lastName' => 'clark',
                ]
            ]
        );
    }

    public function testListUsersByLastName(ApiTester $I): void
    {
        $I->sendGET('/users?limit=1&name=susan');

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseContainsJson(
            [
                [
                    'userId' => 2,
                    'firstName' => 'susan',
                    'lastName' => 'clark',
                ]
            ]
        );
    }

    public function testUndefinedLimit(ApiTester $I): void
    {
        $I->sendGET('/users?limit=');

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function testInvalidLimit(ApiTester $I): void
    {
        $I->sendGET('/users?limit=-1');

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function testUndefinedOffset(ApiTester $I): void
    {
        $I->sendGET('/users?offset=');

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function testInvalidOffset(ApiTester $I): void
    {
        $I->sendGET('/users?offset=-1');

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }
}
