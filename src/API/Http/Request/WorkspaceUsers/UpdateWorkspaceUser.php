<?php

namespace Marek\Toggable\API\Http\Request\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateWorkspaceUser
 * @package Marek\Toggable\API\Http\Request\WorkspaceUsers
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Workspace\User $workspaceUser
 */
class UpdateWorkspaceUser extends DeleteWorkspaceUser
{
    /**
     * @var string
     */
    public $uri = 'workspace_users/{workspace_user_id}';

    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Workspace\User
     */
    public $workspaceUser;

    /**
     * @var boolean
     */
    public $data = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('workspace_user' => $this->workspaceUser->toArray());
    }
}
