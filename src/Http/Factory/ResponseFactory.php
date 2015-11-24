<?php

namespace Marek\Toggl\Http\Factory;

use Marek\Toggl\Http\Value\Response\Response;
use Psr\Http\Message\ResponseInterface;

class ResponseFactory implements ResponseFactoryInterface
{

    public function createFromResponse(ResponseInterface $response)
    {
        return new Response(
            $response->getStatusCode(),
            json_decode((string)$response->getBody(), true)
        );
    }
}
