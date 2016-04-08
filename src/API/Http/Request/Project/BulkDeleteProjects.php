<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkDeleteProjects
 * @package Marek\Toggable\API\Http\Request\Project
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\Project[] $projects
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
     * @var \Marek\Toggable\API\Toggl\Values\Project\Project[]
     */
    public $projects;

    /**
     * BulkDeleteProjects constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $projectIds = array();
        foreach ($this->projects as $project) {
            $projectIds[] = $project->id;
        }

        $projectIds = implode(',', $projectIds);

        $this->uri = str_replace('{project_ids}', $projectIds, $this->uri);
    }
}
