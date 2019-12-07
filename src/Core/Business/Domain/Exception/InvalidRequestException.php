<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Core\Business\Domain\Exception;

use InvalidArgumentException;
use Throwable;

class InvalidRequestException extends InvalidArgumentException implements HttpExceptionInterface
{
    public function __construct($message = '', $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
