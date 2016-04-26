<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkDeleteProjects
 * @package Marek\Toggable\API\Http\Request\Project
 *
 * @property-read array $projectsIds
 */
class BulkDeleteProjects extends Request
{
    /**
     * @var string
     */
    public $uri = 'projects/{project_ids}';

    /**
     * @var string
     */
    public $method = Request::DELETE;

    /**
     * @var array
     */
    public $projectsIds;

    /**
     * BulkDeleteProjects constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $projectIds = implode(',', $this->projectsIds);

        $this->uri = str_replace('{project_ids}', $projectIds, $this->uri);
    }
}
