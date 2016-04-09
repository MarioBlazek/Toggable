<?php

namespace Marek\Toggable\API\Http\Request\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DeleteWorkspaceUser
 * @package Marek\Toggable\API\Http\Request\WorkspaceUsers
 *
 * @property-read int $workspaceUserId
 */
class DeleteWorkspaceUser extends Request
{
    /**
     * @var string
     */
    public $uri = 'workspace_users/{workspace_user_id}';

    /**
     * @var string
     */
    public $method = Request::DELETE;

    /**
     * @var int
     */
    public $workspaceUserId;

    /**
     * DeleteWorkspaceUser constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $this->uri = str_replace('{workspace_user_id}', $this->workspaceUserId, $this->uri);
    }
}
