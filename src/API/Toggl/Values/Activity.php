<?php

namespace Marek\Toggable\API\Toggl\Values;

/**
 * Class Activity
 * @package Marek\Toggable\API\Toggl\Values
 */
class Activity
{
    /**
     * Only active
     */
    const ACTIVE = 'true';

    /**
     * Only inactive
     */
    const INACTIVE = 'false';

    /**
     * Both active and inactive
     */
    const ACTIVE_AND_INACTIVE = 'both';
}
