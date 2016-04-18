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
    public function canHydrate($object)
    {
        if ($object instanceof Subscription) {
            return true;
        }

        return false;
    }
}
