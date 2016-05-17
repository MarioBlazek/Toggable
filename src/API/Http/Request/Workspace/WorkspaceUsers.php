<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

/**
 * Class WorkspaceUsers
 * @package Marek\Toggable\API\Http\Request\Workspace
 */
class WorkspaceUsers extends Workspace
{
    /**
     * @var string
     */
    protected $uri = 'workspaces/{workspace_id}/users';
}
