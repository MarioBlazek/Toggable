<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateTimeEntry
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 */
class UpdateTimeEntry extends GetTimeEntry
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
        return array('time_entry' => $this->data);
    }
}
