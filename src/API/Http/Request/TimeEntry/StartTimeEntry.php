<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class StartTimeEntry
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry
 */
class StartTimeEntry extends Request
{
    /**
     * @var string
     */
    public $uri = 'time_entries/start';

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry
     */
    public $timeEntry;

    /**
     * @var boolean
     */
    public $hasData = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('time_entry' => $this->timeEntry->toArray());
    }
}