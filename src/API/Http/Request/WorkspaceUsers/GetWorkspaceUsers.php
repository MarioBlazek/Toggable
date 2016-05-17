<?php

namespace Marek\Toggable\API\Http\Request\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetWorkspaceUsers
 * @package Marek\Toggable\API\Http\Request\WorkspaceUsers
 *
 * @property-read int $workspaceId
 */
class GetWorkspaceUsers extends Request
{
    /**
     * @var string
     */
    protected $uri = 'workspaces/{workspace_id}/workspace_users';

    /**
     * @var int
     */
    protected $workspaceId;

    /**
     * GetWorkspaceUsers constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $this->uri = str_replace('{workspace_id}', $this->workspaceId, $this->uri);
    }
}
