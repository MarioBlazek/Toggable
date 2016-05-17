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
    protected $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('client' => $this->data);
    }
}
