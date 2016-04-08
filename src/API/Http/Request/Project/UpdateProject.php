<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateProject
 * @package Marek\Toggable\API\Http\Request\Project
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\Project $project
 */
class UpdateProject extends GetProject
{
    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\Project
     */
    public $project;

    /**
     * @var boolean
     */
    public $hasData = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('project' => $this->project->toArray());
    }
}
