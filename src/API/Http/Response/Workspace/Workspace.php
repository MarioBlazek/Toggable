<?php

namespace Marek\Toggable\API\Http\Response\Workspace;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class Workspace
 * @package Marek\Toggable\API\Http\Response\Workspace
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Workspace\Workspace $workspace
 */
class Workspace extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Workspace\Workspace
     */
    public $workspace;
}
