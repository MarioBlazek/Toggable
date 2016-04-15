<?php

namespace Marek\Toggable\Hydrator\Project;

use Marek\Toggable\API\Toggl\Values\Project\User;
use Marek\Toggable\Hydrator\BaseHydrator;

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
