<?php

namespace Marek\Toggable\API\Http\Response\Workspace;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class WorkspaceProjects
 * @package Marek\Toggable\API\Http\Response\Workspace
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\Project[] $projects
 */
class WorkspaceProjects extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\Project[]
     */
    public $projects;
}
