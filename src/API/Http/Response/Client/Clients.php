<?php

namespace Marek\Toggable\API\Http\Response\Client;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Clients
 * @package Marek\Toggable\API\Http\Response\Client
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Client\Client[] $clients
 */
class Clients extends ValueObject
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Client\Client[]
     */
    public $clients;
}
