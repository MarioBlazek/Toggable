<?php

namespace Marek\Toggable\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateMultipleProjectUsers
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\User[] $projectUsers
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\User $projectUser
 */
class CreateMultipleProjectUsers extends Request
{
    /**
     * @var string
     */
    public $uri = 'project_users';

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('project_user' => $this->data);
    }
}
