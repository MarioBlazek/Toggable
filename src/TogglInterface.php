<?php

namespace Marek\Toggable;

/**
 * Interface TogglInterface
 * @package Marek\Toggable
 */
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

    /**
     * @return \Marek\Toggable\API\Toggl\AuthenticationServiceInterface
     */
    public function getAuthenticationService();

    /**
     * @return \Marek\Toggable\API\Toggl\DashboardServiceInterface
     */
    public function getDashboardService();
}
