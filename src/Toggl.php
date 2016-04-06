<?php

namespace Marek\Toggable;

use Marek\Toggable\API\Toggl\AuthenticationServiceInterface;
use Marek\Toggable\API\Toggl\ClientServiceInterface;
use Marek\Toggable\API\Toggl\DashboardServiceInterface;
use Marek\Toggable\API\Toggl\WorkspaceServiceInterface;

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

    public function __construct(
        ClientServiceInterface $clientService,
        WorkspaceServiceInterface $workspaceService,
        AuthenticationServiceInterface $authenticationService,
        DashboardServiceInterface $dashboardService
    )
    {
        $this->clientService = $clientService;
        $this->workspaceService = $workspaceService;
        $this->authenticationService = $authenticationService;
        $this->dashboardService = $dashboardService;
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
}
