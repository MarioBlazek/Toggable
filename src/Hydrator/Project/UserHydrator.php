<?php

namespace Marek\Toggable\Hydrator\Project;

use Marek\Toggable\API\Toggl\Values\Project\User;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class UserHydrator
 * @package Marek\Toggable\Hydrator\Project
 */
class UserHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function canHydrate($object)
    {
        if ($object instanceof User) {
            return true;
        }

        return false;
    }
}
