<?php

namespace Marek\Toggl\API\Value\Task;

use Marek\Toggl\API\Value\ValueObject;

/**
 * Class Task
 * @package Marek\Toggl\API\Value\Task
 *
 * @property-read int $id
 * @property-read string $name
 * @property-read int $pid
 * @property-read int $wid
 * @property-read int $uid
 * @property-read int $estimatedSeconds
 * @property-read boolean $active
 * @property-read \DateTime $lastUpdatetAt
 * @property-read int $trackedSeconds
 */
class Task extends ValueObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * The name of the task
     *
     * @var string
     */
    public $name;

    /**
     * Project ID for the task
     *
     * @var int
     */
    public $pid;

    /**
     * Workspace ID, where the task will be saved
     *
     * @var int
     */
    public $wid;

    /**
     * User ID, to whom the task is assigned to
     *
     * @var int
     */
    public $uid;

    /**
     * Estimated duration of task in seconds
     *
     * @var int
     */
    public $estimatedSeconds;

    /**
     * Whether the task is done or not
     *
     * @var boolean
     */
    public $active = true;

    /**
     * Timestamp that is sent in the response for PUT, indicates the time task was last updated
     *
     * @var \DateTime
     */
    public $lastUpdatetAt;

    /**
     * Total time tracked (in seconds) for the task
     *
     * @var int
     */
    public $trackedSeconds;
}
