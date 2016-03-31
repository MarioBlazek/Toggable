<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateClient
 * @package Marek\Toggable\API\Http\Request\Client
 */
class UpdateClient extends GetClientDetails
{
    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Client\Client
     */
    public $client;

    /**
     * @var boolean
     */
    public $hasData = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('client' => $this->client->toArray());
    }
}
