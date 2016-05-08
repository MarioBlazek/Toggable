<?php

namespace Marek\Toggable\API\Toggl\Values\Task;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Task
 * @packageMarek\Toggable\API\Toggl\Values\Task
 *
 * @property-read int $id
 * @property-read string $name
 * @property-read int $pid
 * @property-read int $wid
 * @property-read int $uid
 * @property-read int $estimated_seconds
 * @property-read boolean $active
 * @property-read \DateTime $at
 * @property-read int $tracked_seconds
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
    public $estimated_seconds;

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
    public $at;

    /**
     * Total time tracked (in seconds) for the task
     *
     * @var int
     */
    public $tracked_seconds;
}
