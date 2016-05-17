<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateWorkspace
 * @package Marek\Toggable\API\Http\Request\Workspace
 */
class UpdateWorkspace extends Workspace
{
    /**
     * @var string
     */
    protected $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('workspace' => $this->data);
    }
}
