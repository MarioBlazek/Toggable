<?php

namespace Marek\Toggable;

use Marek\Toggable\API\Toggl\AuthenticationServiceInterface;
use Marek\Toggable\API\Toggl\ClientServiceInterface;
use Marek\Toggable\API\Toggl\DashboardServiceInterface;
use Marek\Toggable\API\Toggl\ProjectServiceInterface;
use Marek\Toggable\API\Toggl\ProjectUsersServiceInterface;
use Marek\Toggable\API\Toggl\TagServiceInterface;
use Marek\Toggable\API\Toggl\TaskServiceInterface;
use Marek\Toggable\API\Toggl\TimeEntryServiceInterface;
use Marek\Toggable\API\Toggl\UserServiceInterface;
use Marek\Toggable\API\Toggl\WorkspaceServiceInterface;
use Marek\Toggable\API\Toggl\WorkspaceUsersServiceInterface;

/**
 * Class Toggl
 * @package Marek\Toggable
 */
class Toggl implements TogglInterface
{
    /**
     * @var \Marek\Toggable\API\Toggl\ClientServiceInterface
     */
    private $clientService;
    
    /**
     * @var \Marek\Toggable\API\Toggl\WorkspaceServiceInterface
     */
    private $workspaceService;

    /**
     * @var \Marek\Toggable\API\Toggl\AuthenticationServiceInterface
     */
    private $authenticationService;

    /**
     * @var \Marek\Toggable\API\Toggl\DashboardServiceInterface
     */
    private $dashboardService;

    /**
     * @var \Marek\Toggable\API\Toggl\ProjectServiceInterface
     */
    private $projectService;

    /**
     * @var \Marek\Toggable\API\Toggl\ProjectUsersServiceInterface
     */
    private $projectUsersService;

    /**
     * @var \Marek\Toggable\API\Toggl\TagServiceInterface
     */
    private $tagService;

    /**
     * @var \Marek\Toggable\API\Toggl\TaskServiceInterface
     */
    private $taskService;

    /**
     * @var \Marek\Toggable\API\Toggl\TimeEntryServiceInterface
     */
    private $timeEntryService;

    /**
     * @var \Marek\Toggable\API\Toggl\UserServiceInterface
     */
    private $userService;

    /**
     * @var \Marek\Toggable\API\Toggl\WorkspaceUsersServiceInterface
     */
    private $workspaceUsersService;

    /**
     * Toggl constructor.
     *
     * @param \Marek\Toggable\API\Toggl\AuthenticationServiceInterface $authenticationService
     * @param \Marek\Toggable\API\Toggl\ClientServiceInterface $clientService
     * @param \Marek\Toggable\API\Toggl\DashboardServiceInterface $dashboardService
     * @param \Marek\Toggable\API\Toggl\ProjectServiceInterface $projectService
     * @param \Marek\Toggable\API\Toggl\ProjectUsersServiceInterface $projectUsersService
     * @param \Marek\Toggable\API\Toggl\TagServiceInterface $tagService
     * @param \Marek\Toggable\API\Toggl\TaskServiceInterface $taskService
     * @param \Marek\Toggable\API\Toggl\TimeEntryServiceInterface $timeEntryService
     * @param \Marek\Toggable\API\Toggl\UserServiceInterface $userService
     * @param \Marek\Toggable\API\Toggl\WorkspaceServiceInterface $workspaceService
     * @param \Marek\Toggable\API\Toggl\WorkspaceUsersServiceInterface $workspaceUsersService
     */
    public function __construct(
        AuthenticationServiceInterface $authenticationService,
        ClientServiceInterface $clientService,
        DashboardServiceInterface $dashboardService,
        ProjectServiceInterface $projectService,
        ProjectUsersServiceInterface $projectUsersService,
        TagServiceInterface $tagService,
        TaskServiceInterface $taskService,
        TimeEntryServiceInterface $timeEntryService,
        UserServiceInterface $userService,
        WorkspaceServiceInterface $workspaceService,
        WorkspaceUsersServiceInterface $workspaceUsersService
    )
    {
        $this->clientService = $clientService;
        $this->workspaceService = $workspaceService;
        $this->authenticationService = $authenticationService;
        $this->dashboardService = $dashboardService;
        $this->projectService = $projectService;
        $this->projectUsersService = $projectUsersService;
        $this->tagService = $tagService;
        $this->taskService = $taskService;
        $this->timeEntryService = $timeEntryService;
        $this->userService = $userService;
        $this->workspaceUsersService = $workspaceUsersService;
    }

    /**
     * {@inheritdoc}
     */
    public function getClientService()
    {
        return $this->clientService;
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceService()
    {
        return $this->workspaceService;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthenticationService()
    {
        return $this->authenticationService;
    }

    /**
     * @inheritDoc
     */
    public function getDashboardService()
    {
        return $this->dashboardService;
    }

    /**
     * @inheritDoc
     */
    public function getWorkspaceUsersService()
    {
        return $this->workspaceUsersService;
    }

    /**
     * @inheritDoc
     */
    public function getUserService()
    {
        return $this->userService;
    }

    /**
     * @inheritDoc
     */
    public function getProjectService()
    {
        return $this->projectService;
    }

    /**
     * @inheritDoc
     */
    public function getProjectUsersService()
    {
        return $this->projectUsersService;
    }

    /**
     * @inheritDoc
     */
    public function getTagService()
    {
        return $this->tagService;
    }

    /**
     * @inheritDoc
     */
    public function getTaskService()
    {
        return $this->taskService;
    }

    /**
     * @inheritDoc
     */
    public function getTimeEntryService()
    {
        return $this->timeEntryService;
    }
}
