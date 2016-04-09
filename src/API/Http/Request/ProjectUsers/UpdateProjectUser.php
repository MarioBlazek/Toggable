<?php

namespace Marek\Toggable\API\Http\Request\ProjectUser;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateProjectUser
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\User $projectUser
 */
class UpdateProjectUser extends DeleteProjectUser
{
    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\User
     */
    public $projectUser;

    /**
     * @var boolean
     */
    public $data = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('project_user' => $this->projectUser->toArray());
    }
}
