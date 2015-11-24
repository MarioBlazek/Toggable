<?php

namespace Marek\Toggl\Http\Factory;

use GuzzleHttp\Psr7\Request;
use Marek\Toggl\Http\Value\Request\Value;

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
    public function createWithParameters($method, $uri, Value $data)
    {
        return new Request(
            $method,
            $uri,
            $this->headers,
            $data->data
        );
    }
}
