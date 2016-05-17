<?php

namespace Marek\Toggable\API\Toggl\Values\Dashboard;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Dashboard
 * @package Marek\Toggable\API\Toggl\Values\Dashboard
 *
 * @property-read Activity[] $activity
 * @property-read MostActiveUser[] $mostActiveUser
 */
class Dashboard extends ValueObject
{
    /**
     * @var Activity[]
     */
    protected $activity;

    /**
     * @var MostActiveUser[]
     */
    protected $mostActiveUser;
}
