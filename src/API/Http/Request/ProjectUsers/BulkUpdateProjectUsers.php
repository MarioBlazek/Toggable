<?php

namespace Marek\Toggable\API\Http\Request\ProjectUser;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkUpdateProjectUsers
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\User $projectUser
 */
class BulkUpdateProjectUsers extends BulkDeleteProjectUsers
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\User
     */
    public $projectUser;

    /**
     * @var string
     */
    public $method = Request::PUT;

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
