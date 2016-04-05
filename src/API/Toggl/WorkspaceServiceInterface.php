<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface WorkspaceServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface WorkspaceServiceInterface
{
    /**
     * Return all available Workspaces
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\Workspaces
     */
    public function getWorkspaces();

    /**
     * Returns workspace by id
     *
     * @param int $workspaceId
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\Workspace
     */
    public function getWorkspace($workspaceId);

    /**
     * Returns workspace users by workspace id
     *
     * @param int $workspaceId
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\WorkspaceUsers
     */
    public function getWorkspaceUsers($workspaceId);

    /**
     * Returns workspace clients by workspace id
     *
     * @param int $workspaceId
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\WorkspaceClients
     */
    public function getWorkspaceClients($workspaceId);

    /**
     * Returns workspace projects by workspace id
     *
     * @param int $workspaceId
     * @param string $active
     * @param string $actualHours
     * @param string $onlyTemplates
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\WorkspaceProjects
     */
    public function getWorkspaceProjects($workspaceId, $active = \Marek\Toggable\API\Toggl\Values\Activity::ACTIVE, $actualHours = 'false', $onlyTemplates = 'false');

    /**
     * Returns workspace tasks by workspace id
     *
     * @param int $workspaceId
     * @param string $active
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\WorkspaceTasks
     */
    public function getWorkspaceTasks($workspaceId, $active = \Marek\Toggable\API\Toggl\Values\Activity::ACTIVE);

    /**
     * Returns workspace tags by workspace id
     *
     * @param int $workspaceId
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\WorkspaceTags
     */
    public function getWorkspaceTags($workspaceId);

    /**
     * Updates workspace
     *
     * @param int $workspaceId
     * @param \Marek\Toggable\API\Toggl\Values\Workspace\Workspace $workspace
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\Workspace
     */
    public function updateWorkspace($workspaceId, \Marek\Toggable\API\Toggl\Values\Workspace\Workspace $workspace);
}
