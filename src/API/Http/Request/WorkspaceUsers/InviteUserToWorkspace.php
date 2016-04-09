<?php

namespace Marek\Toggable\API\Http\Request\WorkspaceUsers;

/**
 * Class InviteUserToWorkspace
 * @package Marek\Toggable\API\Http\Request\WorkspaceUsers
 * 
 * @property-read \Marek\Toggable\API\Toggl\Values\Emails $emails
 */
class InviteUserToWorkspace extends GetWorkspaceUsers
{
    /**
     * @var string
     */
    public $uri = 'workspaces/{workspace_id}/invite';

    /**
     * @var bool
     */
    public $data = true;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Emails
     */
    public $emails;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('emails' => $this->emails->toArray());
    }
}
