<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateWorkspace
 * @package Marek\Toggable\API\Http\Request\Workspace
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Workspace\Workspace $workspace
 */
class UpdateWorkspace extends Workspace
{
    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Workspace\Workspace
     */
    public $workspace;

    /**
     * @var boolean
     */
    public $hasData = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('workspace' => $this->workspace->toArray());
    }
}
