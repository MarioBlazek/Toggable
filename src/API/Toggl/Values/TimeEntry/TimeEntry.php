<?php

namespace Marek\Toggable\API\Toggl\Values\TimeEntry;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class TimeEntry
 * @package Marek\Toggable\API\Toggl\Values\TimeEntry
 *
 * @property-read int $id
 * @property-read int $uid
 * @property-read string $description
 * @property-read int $wid
 * @property-read int $pid
 * @property-read int $tid
 * @property-read int $guid
 * @property-read boolean $billable
 * @property-read \DateTime $start
 * @property-read \DateTime $stop
 * @property-read int $duration
 * @property-read string $created_with
 * @property-read array $tags
 * @property-read boolean $duronly
 * @property-read \DateTime $at
 */
class TimeEntry extends ValueObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $uid;

    /**
     * @var string
     */
    public $description;

    /**
     * Workspace ID
     *
     * @var int
     */
    public $wid;

    /**
     * Project ID
     *
     * @var int
     */
    public $pid;

    /**
     * Task ID
     *
     * @var int
     */
    public $tid;

    /**
     * @var int
     */
    public $guid;

    /**
     * Available for pro workspaces
     *
     * @var boolean
     */
    public $billable = false;

    /**
     * Time entry start time (ISO 8601 date and time)
     *
     * @var \DateTime
     */
    public $start;

    /**
     * Time entry stop time (ISO 8601 date and time)
     *
     * @var \DateTime
     */
    public $stop;

    /**
     * Time entry duration in seconds.
     * If the time entry is currently running, the duration attribute contains a negative value, denoting the start of the time entry in seconds since epoch (Jan 1 1970).
     * The correct duration can be calculated as current_time + duration, where current_time is the current time in seconds since epoch.
     *
     * @var int
     */
    public $duration;

    /**
     * The name of your client app
     *
     * @var string
     */
    public $created_with;

    /**
     * List of tag names
     *
     * @var array
     */
    public $tags;

    /**
     * Should Toggl show the start and stop time of this time entry?
     *
     * @var boolean
     */
    public $duronly;

    /**
     * Timestamp that is sent in the response, indicates the time item was last updated
     *
     * @var \DateTime
     */
    public $at;
}

