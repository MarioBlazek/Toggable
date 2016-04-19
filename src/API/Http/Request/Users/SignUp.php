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
    public $uri = 'signups';

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * @var boolean
     */
    public $data = true;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\User\SignUp
     */
    public $signUp;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array(
            'user' => $this->signUp->toArray(),
        );
    }
}
