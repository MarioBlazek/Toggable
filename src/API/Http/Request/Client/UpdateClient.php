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
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('client' => $this->data);
    }
}
