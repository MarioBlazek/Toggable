<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateProject
 * @package Marek\Toggable\API\Http\Request\Project
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
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('project' => $this->data);
    }
}
