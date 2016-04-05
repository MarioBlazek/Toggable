<?php

namespace Marek\Toggable\API\Http\Response\Workspace;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class WorkspaceClients
 * @package Marek\Toggable\API\Http\Response\Workspace
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Client\Client[] $clients
 */
class WorkspaceClients extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Client\Client[]
     */
    public $clients;
}
