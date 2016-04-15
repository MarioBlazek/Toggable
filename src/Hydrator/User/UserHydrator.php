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
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof User) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof User) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }
}
