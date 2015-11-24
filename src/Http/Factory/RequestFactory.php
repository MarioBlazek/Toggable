<?php

namespace Marek\Toggl\Http\Factory;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Marek\Toggl\API\Request\Data;

class RequestFactory implements RequestFactoryInterface
{
    /**
     * @var array
     */
    private $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * {@inheritdoc}
     */
    public function createWithParameters($method, $uri, Data $data)
    {
        return new Request(
            $method,
            $uri,
            $this->headers,
            $data->getData()
        );
    }
}
