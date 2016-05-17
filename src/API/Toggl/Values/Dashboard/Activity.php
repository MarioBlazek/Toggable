<?php

namespace Marek\Toggable\API\Toggl\Values\Dashboard;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Activity
 * @package Marek\Toggable\API\Toggl\Values\Dashboard
 *
 * @property-read int $user_id
 * @property-read int $project_id
 * @property-read int $duration
 * @property-read string $description
 * @property-read \DateTime $stop
 * @property-read int $tid
 */
class Activity extends ValueObject
{
    /**
     * User ID
     *
     * @var int
     */
    protected $user_id;

    /**
     *  Project ID (ID is 0 if time entry doesn't have project connected to it)
     *
     * @var int
     */
    protected $project_id;

    /**
     * Time entry duration in seconds.
     * If the time entry is currently running, the duration attribute contains a negative value, denoting the start of the time entry in seconds since epoch (Jan 1 1970).
     * The correct duration can be calculated as current_time + duration, where current_time is the current time in seconds since epoch.
     *
     * @var  int
     */
    protected $duration;

    /**
     * Description property is not present if time entry description is empty
     *
     * @var string
     */
    protected $description;

    /**
     * Time entry stop time (ISO 8601 date and time. Stop property is not present when time entry is still running)
     *
     * @var \DateTime
     */
    protected $stop;

    /**
     * Task id, if applicable
     *
     * @var int
     */
    protected $tid;
}

