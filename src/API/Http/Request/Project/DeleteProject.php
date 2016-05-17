<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DeleteProject
 * @package Marek\Toggable\API\Http\Request\Project
 */
class DeleteProject extends GetProject
{
    /**
     * @var string
     */
    protected $method = Request::DELETE;
}
