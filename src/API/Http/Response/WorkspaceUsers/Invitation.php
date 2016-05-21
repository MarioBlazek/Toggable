<?php

namespace Marek\Toggable\API\Http\Response\WorkspaceUsers;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class Invitation
 * @package Marek\Toggable\API\Http\Response\WorkspaceUsers
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Workspace\User[] $workspaceUsers
 * @property-read \Marek\Toggable\API\Toggl\Values\Notification[] $notifications
 */
class Invitation extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Workspace\User
     */
    public $workspaceUsers;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Notification[]
     */
    public $notifications;
}
