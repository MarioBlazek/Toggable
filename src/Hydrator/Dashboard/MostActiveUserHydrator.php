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
    public function canHydrate($object)
    {
        if ($object instanceof MostActiveUser) {
            return true;
        }

        return false;
    }
}
