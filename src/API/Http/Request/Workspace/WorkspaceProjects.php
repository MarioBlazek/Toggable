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
    public $uri = 'workspaces/{workspace_id}/projects?active={active}&actual_hours={actual_hours}&only_templates={only_templates}';

    /**
     * @var boolean
     */
    public $active = true;

    /**
     * @var boolean
     */
    public $actualHours = false;

    /**
     * @var boolean
     */
    public $onlyTemplates = false;

    /**
     * WorkspaceProjects constructor.
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

        if ($this->actualHours === true) {
            $this->uri = str_replace('{actual_hours}', 'true', $this->uri);
        } else {
            $this->uri = str_replace('{actual_hours}', 'false', $this->uri);
        }

        if ($this->onlyTemplates === true) {
            $this->uri = str_replace('{only_templates}', 'true', $this->uri);
        } else {
            $this->uri = str_replace('{only_templates}', 'false', $this->uri);
        }
    }
}
