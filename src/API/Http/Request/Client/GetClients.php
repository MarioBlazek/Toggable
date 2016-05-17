<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetClients
 * @package Marek\Toggable\API\Http\Request\Client
 */
class GetClients extends Request
{
    /**
     * @var string
     */
    protected $uri = 'clients';
}
