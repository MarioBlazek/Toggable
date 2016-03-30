<?php

namespace Marek\Toggable\API\Toggl\Values\Dashboard;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Activity
 * @package Marek\Toggable\API\Toggl\Values\Dashboard
 *
 * @property-read int $userId
 * @property-read int $projectId
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
    public $userId;

    /**
     *  Project ID (ID is 0 if time entry doesn't have project connected to it)
     *
     * @var int
     */
    public $projectId;

    /**
     * Time entry duration in seconds.
     * If the time entry is currently running, the duration attribute contains a negative value, denoting the start of the time entry in seconds since epoch (Jan 1 1970).
     * The correct duration can be calculated as current_time + duration, where current_time is the current time in seconds since epoch.
     *
     * @var  int
     */
    public $duration;

    /**
     * Description property is not present if time entry description is empty
     *
     * @var string
     */
    public $description;

    /**
     * Time entry stop time (ISO 8601 date and time. Stop property is not present when time entry is still running)
     *
     * @var \DateTime
     */
    public $stop;

    /**
     * Task id, if applicable
     *
     * @var int
     */
    public $tid;
}

