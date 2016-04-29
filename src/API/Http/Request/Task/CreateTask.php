<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateTask
 * @package Marek\Toggable\API\Http\Request\Task
 */
class CreateTask extends Request
{
    /**
     * @var string
     */
    public $uri = 'tasks';

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('task' => $this->data);
    }
}
