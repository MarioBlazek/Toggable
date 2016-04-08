<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkDeleteTasks
 * @package Marek\Toggable\API\Http\Request\Task
 */
class BulkDeleteTasks extends BulkUpdateTasks
{
    /**
     * @var string
     */
    public $method = Request::DELETE;
}
