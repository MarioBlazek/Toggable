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
    public function canHydrate($object)
    {
        if ($object instanceof Activity) {
            return true;
        }

        return false;
    }
}
