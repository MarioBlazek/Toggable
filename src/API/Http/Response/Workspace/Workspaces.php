<?php

namespace Marek\Toggable\API\Http\Response\Workspace;

use Marek\Toggable\API\Http\Response\Response;
use Marek\Toggable\API\Toggl\Values\Workspace\Workspace;

/**
 * Class Workspaces
 * @package Marek\Toggable\API\Http\Response\Workspace
 *
 * @property-read Workspace[] $workspaces
 */
class Workspaces extends Response
{
    /**
     * @var Workspace[]
     */
    public $workspaces;
}
