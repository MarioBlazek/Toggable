<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;
use Marek\Toggable\API\Toggl\Values\Client\Client;

/**
 * Class CreateClientRequest
 * @package Marek\Toggable\API\Http\Request\Client
 */
class CreateClientRequest extends Request
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
     * @var Client
     */
    public $client;

    /**
     * @var array
     */
    public $headers = array(
        'Content-Type' => 'application/json',
    );

    /**
     * {@inheritdoc}
     */
    public function toArray() 
    {
        return array('client' => $this->client->toArray());
    }
}
