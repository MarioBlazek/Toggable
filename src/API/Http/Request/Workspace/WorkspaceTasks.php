<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

/**
 * Class WorkspaceTasks
 * @package Marek\Toggable\API\Http\Request\Workspace
 *
 * @property-read string $active
 */
class WorkspaceTasks extends Workspace
{
    /**
     * @var string
     */
    public $uri = 'workspaces/{workspace_id}/tasks?active={active}';

    /**
     * @var string
     */
    public $active = 'true';

    /**
     * WorkspaceTasks constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $this->uri = str_replace('{active}', $this->active, $this->uri);
    }
}
