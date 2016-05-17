<?php

namespace Marek\Toggable\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateProjectUser
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 */
class UpdateProjectUser extends DeleteProjectUser
{
    /**
     * @var string
     */
    protected $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('project_user' => $this->data);
    }
}
