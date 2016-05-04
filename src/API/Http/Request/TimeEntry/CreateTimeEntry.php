<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateTimeEntry
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 */
class CreateTimeEntry extends Request
{
    /**
     * @var string
     */
    public $uri = 'time_entries';

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('time_entry' => $this->data);
    }
}
