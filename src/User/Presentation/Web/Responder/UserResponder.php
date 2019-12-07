<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Presentation\Web\Responder;

use Psr\Http\Message\ResponseInterface;
use Wazelin\TestTakersApi\Core\Presentation\Web\Responder\JsonResponder;
use Wazelin\TestTakersApi\User\Business\Domain\User;
use Wazelin\TestTakersApi\User\Presentation\Web\Responder\View\Json\UserJsonView;

class UserResponder
{
    private JsonResponder $responder;

    public function __construct(JsonResponder $responder)
    {
        $this->responder = $responder;
    }

    public function respond(ResponseInterface $response, User $user): ResponseInterface
    {
        return $this->responder->respond(
            $response,
            new UserJsonView($user)
        );
    }
}
