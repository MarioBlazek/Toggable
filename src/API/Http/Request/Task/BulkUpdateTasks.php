<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkUpdateTasks
 * @package Marek\Toggable\API\Http\Request\Task
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Task\Task[] $tasks
 */
class BulkUpdateTasks extends Request
{
    /**
     * @var string
     */
    public $uri = 'tasks/{task_ids}';

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Task\Task[]
     */
    public $tasks;

    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * BulkUpdateTasks constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $taskIds = array();
        foreach ($this->tasks as $task) {
            $taskIds[] = $task->id;
        }

        $taskIds = implode(',', $taskIds);

        $this->uri = str_replace('{task_ids}', $taskIds, $this->uri);
    }
}
