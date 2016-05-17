<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DeleteClient
 * @package Marek\Toggable\API\Http\Request\Client
 */
class DeleteClient extends GetClientDetails
{
    /**
     * @var string
     */
    protected $method = Request::DELETE;
}
