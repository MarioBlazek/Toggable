<?php

namespace Marek\Toggable\API\Http\Request\Project;

/**
 * Class GetProjectTasks
 * @package Marek\Toggable\API\Http\Request\Project
 */
class GetProjectTasks extends GetProject
{
    /**
     * @var string
     */
    public $uri = 'projects/{project_id}/tasks';
}
