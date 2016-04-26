<?php

namespace Marek\Toggable\API\Http\Request\Project;

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
}
