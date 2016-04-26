<?php

namespace Marek\Toggable\API\Http\Request\Project;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetProject
 * @package Marek\Toggable\API\Http\Request\Project
 *
 * @property-read int $projectId
 */
class GetProject extends Request
{
    /**
     * @var string
     */
    public $uri = 'projects/{project_id}';

    /**
     * @var int
     */
    public $projectId;

    /**
     * GetProject constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
        $this->uri = str_replace('{project_id}', $this->projectId, $this->uri);
    }
}
