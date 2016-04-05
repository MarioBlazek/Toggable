<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

/**
 * Class WorkspaceProjects
 * @package Marek\Toggable\API\Http\Request\Workspace
 *
 * @property-read string $active
 * @property-read string $actualHours
 * @property-read string $onlyTemplates
 */
class WorkspaceProjects extends Workspace
{
    /**
     * @var string
     */
    public $uri = 'workspaces/{workspace_id}/projects?active={active}&actual_hours={actual_hours}&only_templates={only_templates}';

    /**
     * @var string
     */
    public $active = 'true';

    /**
     * @var string
     */
    public $actualHours = 'false';

    /**
     * @var string
     */
    public $onlyTemplates = 'false';

    /**
     * WorkspaceProjects constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $this->uri = str_replace('{active}', $this->active, $this->uri);
        $this->uri = str_replace('{actual_hours}', $this->actualHours, $this->uri);
        $this->uri = str_replace('{only_templates}', $this->onlyTemplates, $this->uri);
    }
}
