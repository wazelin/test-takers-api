<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Core\Presentation\Web\RequestHandler;

use Wazelin\TestTakersApi\Core\Business\Domain\Exception\InvalidRequestException;
use Webmozart\Assert\Assert as BaseAssert;

class Assert extends BaseAssert
{
    /**
     * @inheritDoc
     */
    protected static function reportInvalidArgument($message): void
    {
        throw new InvalidRequestException($message);
    }
}
