<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateTask
 * @package Marek\Toggable\API\Http\Request\Task
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Task\Task $task
 */
class CreateTask extends Request
{
    /**
     * @var string
     */
    public $uri = 'tasks';

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Task\Task
     */
    public $task;

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * @var boolean
     */
    public $hasData = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('task' => $this->task->toArray());
    }
}
