<?php

namespace Marek\Toggable;

use Marek\Toggable\API\Toggl\ClientServiceInterface;
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

    public function __construct(
        ClientServiceInterface $clientService,
        WorkspaceServiceInterface $workspaceService
    )
    {
        $this->clientService = $clientService;
        $this->workspaceService = $workspaceService;
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


}
