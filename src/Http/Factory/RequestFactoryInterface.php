<?php

namespace Marek\Toggl\Http\Factory;

use Marek\Toggl\Http\Value\Request\Value;
use Psr\Http\Message\RequestInterface;

interface RequestFactoryInterface
{
    /**
     * @param string $method
     * @param string $uri
     * @param Value $data
     *
     * @return RequestInterface
     */
    public function createWithParameters($method, $uri, Value $data);
}
