<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetClientsRequest
 * @package Marek\Toggable\API\Http\Request\Client
 */
class GetClientsRequest extends Request
{
    /**
     * @var string
     */
    public $uri = 'clients';

    /**
     * @var string
     */
    public $method = Request::GET;
}
