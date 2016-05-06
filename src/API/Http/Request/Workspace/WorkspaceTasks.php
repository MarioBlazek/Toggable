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
    public $uri = 'workspaces/{workspace_id}/tasks?active={active}';

    /**
     * @var boolean
     */
    public $active = true;

    /**
     * WorkspaceTasks constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        if ($this->active === true) {
            $this->uri = str_replace('{active}', 'true', $this->uri);
        } else {
            $this->uri = str_replace('{active}', 'false', $this->uri);
        }
    }
}
