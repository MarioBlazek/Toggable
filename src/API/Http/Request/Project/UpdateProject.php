<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateProject
 * @package Marek\Toggable\API\Http\Request\Project
 */
class UpdateProject extends GetProject
{
    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('project' => $this->data);
    }
}
