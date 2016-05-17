<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkUpdateTasks
 * @package Marek\Toggable\API\Http\Request\Task
 *
 * @property-read array $taskIds
 */
class BulkUpdateTasks extends BulkDeleteTasks
{
    /**
     * @var string
     */
    protected $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('task' => $this->data);
    }
}
