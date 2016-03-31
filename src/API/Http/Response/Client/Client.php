<?php

namespace Marek\Toggable\API\Http\Response\Client;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Client
 * @package Marek\Toggable\API\Http\Response\Client
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Client\Client  $client
 */
class Client extends ValueObject
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Client\Client
     */
    public $client;
}
