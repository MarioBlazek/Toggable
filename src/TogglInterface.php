<?php

namespace Marek\Toggable;

interface TogglInterface
{
    /**
     * @return \Marek\Toggable\API\Toggl\ClientServiceInterface
     */
    public function getClientService();

    /**
     * @return \Marek\Toggable\API\Toggl\WorkspaceServiceInterface
     */
    public function getWorkspaceService();
}
