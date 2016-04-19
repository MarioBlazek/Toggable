<?php

namespace Marek\Toggable\API\Http\Response\Users;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class User
 * @package Marek\Toggable\API\Http\Response\Users
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\User\User $user
 */
class User extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\User\User
     */
    public $user;
}
