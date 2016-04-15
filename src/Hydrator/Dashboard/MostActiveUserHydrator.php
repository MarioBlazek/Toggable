<?php

namespace Marek\Toggable\Hydrator\Dashboard;

use Marek\Toggable\API\Toggl\Values\Dashboard\MostActiveUser;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class MostActiveUserHydrator
 * @package Marek\Toggable\Hydrator\Dashboard
 */
class MostActiveUserHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof MostActiveUser) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof MostActiveUser) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }
}
