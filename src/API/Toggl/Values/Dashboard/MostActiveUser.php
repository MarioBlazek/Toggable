<?php

namespace Marek\Toggable\API\Toggl\Values\Dashboard;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class MostActiveUser
 * @package Marek\Toggable\API\Toggl\Values\Dashboard
 *
 * @property-read int $user_id
 * @property-read int $duration
 */
class MostActiveUser extends ValueObject
{
    /**
     * User ID
     *
     * @var int
     */
    protected $user_id;

    /**
     * Sum of time entry durations that have been created during last 7 days
     *
     * @var int
     */
    protected $duration;
}
