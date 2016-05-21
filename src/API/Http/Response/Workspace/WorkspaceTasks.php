<?php

namespace Marek\Toggable\API\Http\Response\Workspace;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class WorkspaceTasks
 * @package Marek\Toggable\API\Http\Response\Workspace
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Task\Task[] $tasks
 */
class WorkspaceTasks extends ValueObject
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Task\Task[]
     */
    public $tasks;
}
