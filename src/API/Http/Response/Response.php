<?php

namespace Marek\Toggable\API\Http\Response;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Response
 * @package Marek\Toggable\API\Http\Response
 *
 * @property-read int $statusCode
 * @property-read array $body
 * @property-read string $cookie
 */
class Response extends ValueObject
{
    /**
     * @var int
     */
    public $statusCode;

    /**
     * @var array
     */
    public $body;

    /**
     * @var string
     */
    public $cookie;
}
