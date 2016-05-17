<?php

namespace Marek\Toggable\API\Http\Request\ProjectUsers;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkDeleteProjectUsers
 * @package Marek\Toggable\API\Http\Request\ProjectUser
 *
 * @property-read array $projectUserIds
 */
class BulkDeleteProjectUsers extends Request
{
    /**
     * @var string
     */
    protected $uri = 'project_users/{project_user_ids}';

    /**
     * @var array
     */
    protected $projectUserIds;

    /**
     * @var string
     */
    protected $method = Request::DELETE;

    /**
     * BulkDeleteProjectUsers constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $projectUserIds = implode(',', $this->projectUserIds);

        $this->uri = str_replace('{project_user_ids}', $projectUserIds, $this->uri);
    }
}
