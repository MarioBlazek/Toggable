<?php

namespace Marek\Toggl\API\Value\Dashboard;

use Marek\Toggl\API\Value\ValueObject;

/**
 * Class Dashboard
 * @package Marek\Toggl\API\Value\Dashboard
 *
 * @property-read Activity[] $activity
 * @property-read MostActiveUser[] $mostActiveUser
 */
class Dashboard extends ValueObject
{
    /**
     * @var Activity[]
     */
    public $activity;

    /**
     * @var MostActiveUser[]
     */
    public $mostActiveUser;
}
