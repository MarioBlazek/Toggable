<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateClient
 * @package Marek\Toggable\API\Http\Request\Client
 */
class CreateClient extends Request
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
