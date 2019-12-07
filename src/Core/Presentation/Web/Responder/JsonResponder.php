<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Core\Presentation\Web\Responder;

use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

use function json_encode;

use const JSON_PRESERVE_ZERO_FRACTION;

class JsonResponder
{
    public function respond(
        ResponseInterface $response,
        JsonSerializable $payload = null,
        int $statusCode = 200
    ): ResponseInterface {
        if (null !== $payload) {
            $response->getBody()->write(
                json_encode($payload, JSON_THROW_ON_ERROR | JSON_PRESERVE_ZERO_FRACTION, 512)
            );
        }

        return $response->withStatus($statusCode);
    }
}
