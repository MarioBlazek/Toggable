<?php

namespace Marek\Toggable\API\Http\Response\TimeEntry;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class TimeEntries
 * @package Marek\Toggable\API\Http\Response\TimeEntry
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry[] $timeEntries
 */
class TimeEntries extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry[]
     */
    public $timeEntries;
}
