<?php

namespace Marek\Toggable\Hydrator\Workspace;

use Marek\Toggable\API\Toggl\Values\Workspace\Subscription;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class SubscriptionHydrator
 * @package Marek\Toggable\Hydrator\Workspace
 */
class SubscriptionHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof Subscription) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof Subscription) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }
}
