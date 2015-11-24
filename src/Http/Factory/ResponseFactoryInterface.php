<?php

namespace Marek\Toggl\Http\Factory;

use Psr\Http\Message\ResponseInterface;

interface ResponseFactoryInterface
{
    public function createFromResponse(ResponseInterface $response);
}
