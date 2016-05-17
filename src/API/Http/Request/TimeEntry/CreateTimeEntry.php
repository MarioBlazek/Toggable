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
    protected $uri = 'time_entries';

    /**
     * @var string
     */
    protected $method = Request::POST;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('time_entry' => $this->data);
    }
}
