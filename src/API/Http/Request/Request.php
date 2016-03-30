<?php

namespace Marek\Toggable\API\Http\Request;

use Marek\Toggable\API\Toggl\ValueObject;

/**
 * Class Request
 * @package Marek\Toggable\API\Http\Request
 *
 * @property-read string $method
 * @property-read string $uri
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
}
