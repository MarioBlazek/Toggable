<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;
use JsonSerializable;
use Marek\Toggable\API\Toggl\ValueObject;

class CreateClientRequest extends Request implements JsonSerializable
{
    /**
     * @var string
     */
    public $uri = 'clients';

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * @var ValueObject
     */
    public $data;

    /**
     * {@inheritdoc}
     */
    function jsonSerialize()
    {
        
    }
}
