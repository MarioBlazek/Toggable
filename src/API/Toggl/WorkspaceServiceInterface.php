<?php

namespace Marek\Toggable\API\Toggl;

use Marek\Toggable\API\Http\Response\Workspace\Workspace;

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
}
