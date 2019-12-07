<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Test;

use Codeception\Actor;
use Codeception\Lib\Friend;

/**
 * @method Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class ApiTester extends Actor
{
	use _generated\ApiTesterActions;
}
