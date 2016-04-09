<?php

namespace Marek\Toggable\API\Http\Request\ProjectUser;

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
     * @var \Marek\Toggable\API\Toggl\Values\Project\User[]
     */
    public $projectUsers;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\User
     */
    public $projectUser;

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * @var boolean
     */
    public $data = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $data = $this->projectUser->toArray();

        $projectUserIds = array();
        foreach ($this->projectUsers as $projectUser) {
            $projectUserIds[] = $projectUser->id;
        }

        $projectUserIds = implode(',', $projectUserIds);

        $data['uid'] = $projectUserIds;

        return array('project_user' => $data);
    }
}
