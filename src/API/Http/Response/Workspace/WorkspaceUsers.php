<?php

namespace Marek\Toggable\API\Http\Response\Workspace;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class WorkspaceUsers
 * @package Marek\Toggable\API\Http\Response\Workspace
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\User\User[] $users
 */
class WorkspaceUsers extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\User\User[]
     */
    public $users;
}
