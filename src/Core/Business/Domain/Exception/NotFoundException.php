<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Core\Business\Domain\Exception;

use RuntimeException;

use function sprintf;

class NotFoundException extends RuntimeException implements HttpExceptionInterface
{
    private const MESSAGE = '%s not found';

    public static function create(string $resourceName): self
    {
        return new self(sprintf(self::MESSAGE, $resourceName), 404);
    }
}
