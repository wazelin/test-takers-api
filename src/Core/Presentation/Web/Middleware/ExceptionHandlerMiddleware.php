<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Core\Presentation\Web\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpException;
use Wazelin\TestTakersApi\Core\Business\Domain\Exception\HttpExceptionInterface;

class ExceptionHandlerMiddleware
{
    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $requestHandler
     * @return ResponseInterface
     *
     * @throws HttpException
     */
    public function __invoke(
        ServerRequestInterface $request,
        RequestHandlerInterface $requestHandler
    ): ResponseInterface {
        try {
            return $requestHandler->handle($request);
        }
        catch (HttpExceptionInterface $exception)
        {
            throw new HttpException($request, $exception->getMessage(), $exception->getCode());
        }
    }
}
