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
    public $uri = 'tasks/{task_id}';

    /**
     * @var int
     */
    public $taskId;

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
