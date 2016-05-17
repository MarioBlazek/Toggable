<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

/**
 * Class WorkspaceClients
 * @package Marek\Toggable\API\Http\Request\Workspace
 */
class WorkspaceClients extends Workspace
{
    /**
     * @var string
     */
    protected $uri = 'workspaces/{workspace_id}/clients';
}
