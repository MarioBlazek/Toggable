<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class Workspace
 * @package Marek\Toggable\API\Http\Request\Workspace
 *
 * @property-read int $workspaceId
 */
class Workspace extends Request
{
    /**
     * @var string
     */
    public $uri = 'workspaces/{workspace_id}';

    /**
     * @var int
     */
    public $workspaceId;

    /**
     * Workspace constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
        $this->uri = str_replace('{workspace_id}', $this->workspaceId, $this->uri);
    }
}
