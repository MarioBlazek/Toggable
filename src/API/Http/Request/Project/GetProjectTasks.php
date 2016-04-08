<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetProjectTasks
 * @package Marek\Toggable\API\Http\Request\Project
 */
class GetProjectTasks extends Request
{
    /**
     * @var string
     */
    public $uri = 'projects/{project_id}/tasks';

    /**
     * @var string
     */
    public $method = Request::GET;
}
