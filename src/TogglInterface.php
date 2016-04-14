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
     * @return \Marek\Toggable\API\Toggl\WorkspaceUsersServiceInterface
     */
    public function getWorkspaceUsersService();

    /**
     * @return \Marek\Toggable\API\Toggl\DashboardServiceInterface
     */
    public function getDashboardService();

    /**
     * @return \Marek\Toggable\API\Toggl\UserServiceInterface
     */
    public function getUserService();

    /**
     * @return \Marek\Toggable\API\Toggl\ProjectServiceInterface
     */
    public function getProjectService();

    /**
     * @return \Marek\Toggable\API\Toggl\ProjectUsersServiceInterface
     */
    public function getProjectUsersService();

    /**
     * @return \Marek\Toggable\API\Toggl\TagServiceInterface
     */
    public function getTagService();

    /**
     * @return \Marek\Toggable\API\Toggl\TaskServiceInterface
     */
    public function getTaskService();

    /**
     * @return \Marek\Toggable\API\Toggl\TimeEntryServiceInterface
     */
    public function getTimeEntryService();
}
