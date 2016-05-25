<?php

namespace Marek\Toggable\API\Http\Response\Task;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class Task
 * @package Marek\Toggable\API\Http\Response\Task
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Task\Task $task
 */
class Task extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Task\Task
     */
    protected $task;
}
