<?php

namespace Marek\Toggable\API\Http\Client;

use Marek\Toggable\API\Toggl\Client\Client;
use Marek\Toggable\API\Toggl\ValueObject;

/**
 * Class ClientResponse
 * @package Marek\Toggable\API\Http\Client
 *
 * @property-read \Marek\Toggable\API\Toggl\Client\Client $client
 */
class ClientResponse extends ValueObject
{
    /**
     * @var Client
     */
    public $client;
}
