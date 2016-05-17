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
    protected $id;

    /**
     * @var int
     */
    protected $uid;

    /**
     * @var string
     */
    protected $description;

    /**
     * Workspace ID
     *
     * @var int
     */
    protected $wid;

    /**
     * Project ID
     *
     * @var int
     */
    protected $pid;

    /**
     * Task ID
     *
     * @var int
     */
    protected $tid;

    /**
     * @var int
     */
    protected $guid;

    /**
     * Available for pro workspaces
     *
     * @var boolean
     */
    protected $billable = false;

    /**
     * Time entry start time (ISO 8601 date and time)
     *
     * @var \DateTime
     */
    protected $start;

    /**
     * Time entry stop time (ISO 8601 date and time)
     *
     * @var \DateTime
     */
    protected $stop;

    /**
     * Time entry duration in seconds.
     * If the time entry is currently running, the duration attribute contains a negative value, denoting the start of the time entry in seconds since epoch (Jan 1 1970).
     * The correct duration can be calculated as current_time + duration, where current_time is the current time in seconds since epoch.
     *
     * @var int
     */
    protected $duration;

    /**
     * The name of your client app
     *
     * @var string
     */
    protected $created_with;

    /**
     * List of tag names
     *
     * @var array
     */
    protected $tags;

    /**
     * Should Toggl show the start and stop time of this time entry?
     *
     * @var boolean
     */
    protected $duronly;

    /**
     * Timestamp that is sent in the response, indicates the time item was last updated
     *
     * @var \DateTime
     */
    protected $at;
}

