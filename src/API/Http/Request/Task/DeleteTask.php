<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DeleteTask
 * @package Marek\Toggable\API\Http\Request\Task
 */
class DeleteTask extends GetTask
{
    /**
     * @var string
     */
    public $method = Request::DELETE;
}
