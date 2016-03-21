<?php

namespace Marek\Toggable\API\Http\Client;

use Marek\Toggable\API\Toggl\Client\Client;
use Marek\Toggable\API\Toggl\ValueObject;

/**
 * Class ClientsResponse
 * @package Marek\Toggable\API\Http\Client
 *
 * @property-read \Marek\Toggable\API\Toggl\Client\Client[] $clients
 */
class ClientsResponse extends ValueObject
{
    /**
     * @var Client[]
     */
    public $clients;
}
