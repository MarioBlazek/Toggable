<?php

namespace Marek\Toggable\API\Http\Request\ProjectUser;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkDeleteProjectUsers
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\User[] $projectUsers
 */
class BulkDeleteProjectUsers extends Request
{
    /**
     * @var string
     */
    public $uri = 'project_users/{project_user_ids}';

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\User[]
     */
    public $projectUsers;

    /**
     * @var string
     */
    public $method = Request::DELETE;

    /**
     * BulkDeleteProjectUsers constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $projectUserIds = array();
        foreach ($this->projectUsers as $projectUser) {
            $projectUserIds[] = $projectUser->id;
        }

        $projectUserIds = implode(',', $projectUserIds);

        $this->uri = str_replace('{project_user_ids}', $projectUserIds, $this->uri);
    }
}
