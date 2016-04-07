<?php

namespace Marek\Toggable\API\Http\Response\TimeEntry;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class TimeEntry
 * @package Marek\Toggable\API\Http\Response\TimeEntry
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry
 */
class TimeEntry extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry
     */
    public $timeEntry;
}
