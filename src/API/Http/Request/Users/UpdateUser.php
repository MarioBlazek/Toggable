<?php

namespace Marek\Toggable\API\Http\Request\Users;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateUser
 * @package Marek\Toggable\API\Http\Request\Users
 */
class UpdateUser extends Request
{
    /**
     * @var string
     */
    protected $uri = 'me';

    /**
     * @var string
     */
    protected $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('user' => $this->data);
    }
}
