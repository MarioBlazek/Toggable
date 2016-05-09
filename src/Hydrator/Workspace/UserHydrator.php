<?php

namespace Marek\Toggable\Hydrator\Workspace;

use Marek\Toggable\API\Toggl\Values\Workspace\User;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class UserHydrator
 * @package Marek\Toggable\Hydrator\Workspace
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
