<?php

namespace Marek\Toggable\API\Http\Response;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Response
 * @package Marek\Toggable\API\Http\Response
 *
 * @property-read int $statusCode
 * @property-read array $body
 */
class Response extends ValueObject implements ResponseInterface
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var array
     */
    protected $body;

    /**
     * @inheritDoc
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @inheritDoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
