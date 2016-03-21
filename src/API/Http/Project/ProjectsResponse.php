<?php

namespace Marek\Toggable\API\Http\Project;

use Marek\Toggable\API\Toggl\ValueObject;

/**
 * Class ProjectsResponse
 * @package Marek\Toggable\API\Http\Project
 *
 * @property-read \Marek\Toggable\API\Toggl\ValueObject $projects
 */
class ProjectsResponse extends ValueObject
{
    /**
     * @var \Marek\Toggable\API\Toggl\Project\Project[]
     */
    public $projects;
}
