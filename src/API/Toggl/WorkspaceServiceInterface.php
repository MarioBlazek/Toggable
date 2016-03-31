<?php

namespace Marek\Toggable\API\Toggl;

interface WorkspaceServiceInterface
{
    /**
     * Return all available Workspaces
     *
     * @return \Marek\Toggable\API\Http\Response\Workspace\Workspaces
     */
    public function getWorkspaces();
}
