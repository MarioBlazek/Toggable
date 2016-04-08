<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetProjectUsers
 * @package Marek\Toggable\API\Http\Request\Project
 */
class GetProjectUsers extends GetProject
{
    /**
     * @var string
     */
    public $uri = 'projects/{project_id}/project_users';

    /**
     * @var string
     */
    public $method = Request::GET;
}
