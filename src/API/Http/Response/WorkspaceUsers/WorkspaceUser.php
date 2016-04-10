<?php

namespace Marek\Toggable\API\Http\Response\WorkspaceUsers;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class WorkspaceUser
 * @package Marek\Toggable\API\Http\Response\WorkspaceUsers
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Workspace\User $workspaceUser
 */
class WorkspaceUser extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Workspace\User
     */
    public $workspaceUser;
}
