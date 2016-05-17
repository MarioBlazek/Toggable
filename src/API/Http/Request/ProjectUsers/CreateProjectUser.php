<?php

namespace Marek\Toggable\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateProjectUser
 * @package Marek\Toggable\API\Http\Request\ProjectUsers
 */
class CreateProjectUser extends Request
{
    /**
     * @var string
     */
    protected $uri = 'project_users';

    /**
     * @var string
     */
    protected $method = Request::POST;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('project_user' => $this->data);
    }
}
