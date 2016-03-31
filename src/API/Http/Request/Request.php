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
 * @property-read array $headers
 */
class Request extends ValueObject
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    /**
     * @var string
     */
    public $method;

    /**
     * @var string
     */
    public $uri;

    /**
     * @var array
     */
    public $headers = array();

    /**
     * @var bool
     */
    public $hasData = false;

    /**
     * Converts object to array
     *
     * @return array
     *
     * @throws RuntimeException
     */
    public function toArray()
    {
        throw new RuntimeException('Not implemented');
    }
}
