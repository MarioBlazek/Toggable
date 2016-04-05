<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

/**
 * Class WorkspaceTags
 * @package Marek\Toggable\API\Http\Request\Workspace
 */
class WorkspaceTags extends Workspace
{
    /**
     * @var string
     */
    public $uri = 'workspaces/{workspace_id}/tags';
}
