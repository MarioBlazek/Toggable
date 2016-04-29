<?php

namespace Marek\Toggable\API\Http\Request\Task;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateTask
 * @package Marek\Toggable\API\Http\Request\Task
 */
class UpdateTask extends GetTask
{
    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('task' => $this->data);
    }
}
