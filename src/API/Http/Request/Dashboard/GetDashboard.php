<?php

namespace Marek\Toggable\API\Http\Request\Dashboard;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetDashboard
 * @package Marek\Toggable\API\Http\Request\Dashboard
 *
 * @property-read int $workspaceId
 */
class GetDashboard extends Request
{
    /**
     * @var string
     */
    public $uri = 'dashboard/{workspace_id}';

    /**
     * @var string
     */
    public $method = Request::GET;

    /**
     * @var int
     */
    public $workspaceId;

    /**
     * GetDashboard constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
        $this->uri = str_replace('{workspace_id}', $this->workspaceId, $this->uri);
    }
}
