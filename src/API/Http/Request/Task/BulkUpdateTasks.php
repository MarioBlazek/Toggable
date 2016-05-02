<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkUpdateTasks
 * @package Marek\Toggable\API\Http\Request\Task
 *
 * @property-read array $taskIds
 */
class BulkUpdateTasks extends Request
{
    /**
     * @var string
     */
    public $uri = 'tasks/{task_ids}';

    /**
     * @var array
     */
    public $taskIds;

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

        $taskIds = implode(',', $this->taskIds);

        $this->uri = str_replace('{task_ids}', $taskIds, $this->uri);
    }

    public function jsonSerialize()
    {
        return array('task' => $this->data);
    }
}
