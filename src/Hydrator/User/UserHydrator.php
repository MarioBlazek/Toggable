<?php

namespace Marek\Toggable\Hydrator\User;

use Marek\Toggable\API\Toggl\Values\User\User;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class UserHydrator
 * @package Marek\Toggable\Hydrator\User
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
