<?php

namespace Marek\Toggable\API\Http\Request\Users;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class SignUp
 * @package Marek\Toggable\API\Http\Request\Users
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\User\SignUp $signUp
 */
class SignUp extends Request
{
    /**
     * @var string
     */
    protected $uri = 'signups';

    /**
     * @var string
     */
    protected $method = Request::POST;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('user' => $this->data);
    }
}
