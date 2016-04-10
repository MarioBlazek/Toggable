<?php

namespace Marek\Toggable\API\Http\Response\ProjectUsers;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class ProjectUser
 * @package Marek\Toggable\API\Http\Response\ProjectUsers
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\User $projectUser
 */
class ProjectUser extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\User
     */
    public $projectUser;
}
