<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkDeleteTasks
 * @package Marek\Toggable\API\Http\Request\Task
 *
 * @property-read array $taskIds
 */
class BulkDeleteTasks extends Request
{
    /**
     * @var string
     */
    protected $uri = 'tasks/{task_ids}';

    /**
     * @var array
     */
    protected $taskIds;

    /**
     * @var string
     */
    protected $method = Request::DELETE;

    /**
     * BulkDeleteTasks constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $taskIds = implode(',', $this->taskIds);

        $this->uri = str_replace('{task_ids}', $taskIds, $this->uri);
    }
}
