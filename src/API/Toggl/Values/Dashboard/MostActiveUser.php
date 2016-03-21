<?php

namespace Marek\Toggl\API\Value\Dashboard;

use Marek\Toggl\API\Value\ValueObject;

/**
 * Class MostActiveUser
 * @package Marek\Toggl\API\Value\Dashboard
 *
 * @property-read int $userId
 * @property-read int $duration
 */
class MostActiveUser extends ValueObject
{
    /**
     * User ID
     *
     * @var int
     */
    public $userId;

    /**
     * Sum of time entry durations that have been created during last 7 days
     *
     * @var int
     */
    public $duration;
}
