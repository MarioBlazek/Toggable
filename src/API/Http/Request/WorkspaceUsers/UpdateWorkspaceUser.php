<?php

namespace Marek\Toggable\API\Http\Request\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateWorkspaceUser
 * @package Marek\Toggable\API\Http\Request\WorkspaceUsers
 */
class UpdateWorkspaceUser extends DeleteWorkspaceUser
{
    /**
     * @var string
     */
    protected $uri = 'workspace_users/{workspace_user_id}';

    /**
     * @var string
     */
    protected $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('workspace_user' => $this->data);
    }
}
