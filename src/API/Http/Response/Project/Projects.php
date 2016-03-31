<?php

namespace Marek\Toggable\API\Http\Response\Project;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Projects
 * @package Marek\Toggable\API\Http\Project
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\Project[] $projects
 */
class Projects extends ValueObject
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\Project[]
     */
    public $projects;
}
