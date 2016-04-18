<?php

namespace Marek\Toggable\Hydrator\TimeEntry;

use Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class TimeEntryHydrator
 * @package Marek\Toggable\Hydrator\TimeEntry
 */
class TimeEntryHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function canHydrate($object)
    {
        if ($object instanceof TimeEntry) {
            return true;
        }

        return false;
    }
}
