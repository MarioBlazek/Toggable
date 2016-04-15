<?php

namespace Marek\Toggable\Hydrator\Dashboard;

use Marek\Toggable\API\Toggl\Values\Dashboard\Activity;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class ActivityHydrator
 * @package Marek\Toggable\Hydrator\Dashboard
 */
class ActivityHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof Activity) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof Activity) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }
}
