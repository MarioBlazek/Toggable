<?php

namespace Marek\Toggl\Http\Factory;

use Marek\Toggl\API\Request\Data;
use Psr\Http\Message\RequestInterface;

interface RequestFactoryInterface
{
    /**
     * @param string $method
     * @param string $uri
     * @param Data $data
     *
     * @return RequestInterface
     */
    public function createWithParameters($method, $uri, Data $data);
}
