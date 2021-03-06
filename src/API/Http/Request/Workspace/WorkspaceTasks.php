<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

/**
 * Class WorkspaceTasks
 * @package Marek\Toggable\API\Http\Request\Workspace
 *
 * @property-read boolean $active
 */
class WorkspaceTasks extends Workspace
{
    /**
     * @var string
     */
    protected $uri = 'workspaces/{workspace_id}/tasks?active={active}';

    /**
     * @var boolean
     */
    protected $active = true;

    /**
     * WorkspaceTasks constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $this->uri = str_replace('{active}', $this->active ? 'true' : 'false', $this->uri);
    }
}
