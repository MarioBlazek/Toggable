<?php

namespace Marek\Toggable\Service\WorkspaceUsers;

use Marek\Toggable\Service\AbstractService;

/**
 * Class WorkspaceUsersService
 * @package Marek\Toggable\Service\WorkspaceUsers
 */
class WorkspaceUsersService extends AbstractService implements \Marek\Toggable\API\Toggl\WorkspaceServiceInterface
{
    /**
     * @inheritDoc
     */
    public function getWorkspaces()
    {
        // TODO: Implement getWorkspaces() method.
    }

    /**
     * @inheritDoc
     */
    public function getWorkspace($workspaceId)
    {
        // TODO: Implement getWorkspace() method.
    }

    /**
     * @inheritDoc
     */
    public function getWorkspaceUsers($workspaceId)
    {
        // TODO: Implement getWorkspaceUsers() method.
    }

    /**
     * @inheritDoc
     */
    public function getWorkspaceClients($workspaceId)
    {
        // TODO: Implement getWorkspaceClients() method.
    }

    /**
     * @inheritDoc
     */
    public function getWorkspaceProjects($workspaceId, $active = \Marek\Toggable\API\Toggl\Values\Activity::ACTIVE, $actualHours = 'false', $onlyTemplates = 'false')
    {
        // TODO: Implement getWorkspaceProjects() method.
    }

    /**
     * @inheritDoc
     */
    public function getWorkspaceTasks($workspaceId, $active = \Marek\Toggable\API\Toggl\Values\Activity::ACTIVE)
    {
        // TODO: Implement getWorkspaceTasks() method.
    }

    /**
     * @inheritDoc
     */
    public function getWorkspaceTags($workspaceId)
    {
        // TODO: Implement getWorkspaceTags() method.
    }

    /**
     * @inheritDoc
     */
    public function updateWorkspace($workspaceId, \Marek\Toggable\API\Toggl\Values\Workspace\Workspace $workspace)
    {
        // TODO: Implement updateWorkspace() method.
    }

}
