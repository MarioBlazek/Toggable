<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetTask
 * @package Marek\Toggable\API\Http\Request\Task
 *
 * @property-read int $taskId
 */
class GetTask extends Request
{
    /**
     * @var string
     */
    protected $uri = 'tasks/{task_id}';

    /**
     * @var int
     */
    protected $taskId;

    /**
     * GetTask constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
        $this->uri = str_replace('{task_id}', $this->taskId, $this->uri);
    }
}
