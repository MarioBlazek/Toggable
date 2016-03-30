<?php

namespace Marek\Toggable\API\Http\Response;

use Marek\Toggable\API\Toggl\ValueObject;

/**
 * Class Response
 * @package Marek\Toggable\API\Http\Response
 *
 * @property-read int $statusCode
 * @property-read array $body
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
}
