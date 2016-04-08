<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateTask
 * @package Marek\Toggable\API\Http\Request\Task
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Task\Task $task
 */
class UpdateTask extends GetTask
{
    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Task\Task
     */
    public $task;

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
