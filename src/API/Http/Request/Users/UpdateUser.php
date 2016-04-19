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
    public $uri = 'me';

    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var boolean
     */
    public $hasData = true;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\User\User
     */
    public $user;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array(
            'user' => $this->user->toArray(),
        );
    }
}
