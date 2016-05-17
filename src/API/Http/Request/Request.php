<?php

namespace Marek\Toggable\API\Http\Request;

use Marek\Toggable\API\Toggl\Values\ValueObject;
use RuntimeException;

/**
 * Class Request
 * @package Marek\Toggable\API\Http\Request
 *
 * @property-read string $method
 * @property-read string $uri
 * @property-read array $data
 */
class Request extends ValueObject implements RequestInterface
{
    /**
     * @var string
     */
    protected $method = Request::GET;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var array
     */
    protected $data;

    /**
     * @inheritDoc
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        throw new RuntimeException('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return $this->data;
    }
}
