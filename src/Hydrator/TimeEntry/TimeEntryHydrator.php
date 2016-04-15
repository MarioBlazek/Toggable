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
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof TimeEntry) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof TimeEntry) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }
}
