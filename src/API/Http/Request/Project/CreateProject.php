<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateProject
 * @package Marek\Toggable\API\Http\Request\Project
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\Project $project
 */
class CreateProject extends Request
{
    /**
     * @var string
     */
    public $uri = 'projects';

    /**
     * @var string
     */
    public $method = Request::POST;

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
