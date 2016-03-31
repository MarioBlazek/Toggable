<?php

namespace Marek\Toggable\API\Http\Request\Workspace;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class Workspaces
 * @package Marek\Toggable\API\Http\Response
 */
class Workspaces extends Request
{
    /**
     * @var string
     */
    public $uri = 'workspaces';

    /**
     * @var string
     */
    public $method = Request::GET;
}
