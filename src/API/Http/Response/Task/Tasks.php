<?php

namespace Marek\Toggable\API\Http\Response\Task;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class Tasks
 * @package Marek\Toggable\API\Http\Response\Task
 */
class Tasks extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Task\Task[]
     */
    protected $tasks;
}
