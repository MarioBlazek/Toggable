<?php

namespace Marek\Toggable\API\Toggl\Values\User;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class SignUp
 * @package Marek\Toggable\API\Toggl\Values\User
 *
 * @property-read string $email
 * @property-read string $password
 */
class SignUp extends ValueObject
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;
}
