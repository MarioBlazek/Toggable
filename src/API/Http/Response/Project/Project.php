<?php

namespace Marek\Toggable\API\Http\Response\Project;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class Project
 * @package Marek\Toggable\API\Http\Response\Project
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\Project $project
 */
class Project extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\Project
     */
    public $project;
}
