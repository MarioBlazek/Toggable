<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateTimeEntry
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry
 */
class UpdateTimeEntry extends GetTimeEntry
{
    /**
     * @var string
     */
    public $uri = 'time_entries/{time_entry_id}';

    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry
     */
    public $timeEntry;
}
