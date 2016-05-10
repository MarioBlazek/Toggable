<?php

namespace Marek\Toggable\API\Http\Request\WorkspaceUsers;

/**
 * Class InviteUserToWorkspace
 * @package Marek\Toggable\API\Http\Request\WorkspaceUsers
 */
class InviteUserToWorkspace extends GetWorkspaceUsers
{
    /**
     * @var string
     */
    public $uri = 'workspaces/{workspace_id}/invite';

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('emails' => $this->data);
    }
}
