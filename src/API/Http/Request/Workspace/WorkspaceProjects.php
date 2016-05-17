<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

/**
 * Class WorkspaceProjects
 * @package Marek\Toggable\API\Http\Request\Workspace
 *
 * @property-read boolean $active
 * @property-read boolean $actualHours
 * @property-read boolean $onlyTemplates
 */
class WorkspaceProjects extends Workspace
{
    /**
     * @var string
     */
    protected $uri = 'workspaces/{workspace_id}/projects?active={active}&actual_hours={actual_hours}&only_templates={only_templates}';

    /**
     * @var boolean
     */
    protected $active = true;

    /**
     * @var boolean
     */
    protected $actualHours = false;

    /**
     * @var boolean
     */
    protected $onlyTemplates = false;

    /**
     * WorkspaceProjects constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $this->uri = str_replace('{active}', $this->active ? 'true' : 'false', $this->uri);

        $this->uri = str_replace('{actual_hours}', $this->actualHours ? 'true' : 'false', $this->uri);

        $this->uri = str_replace('{only_templates}', $this->onlyTemplates ? 'true' : 'false', $this->uri);
    }
}
