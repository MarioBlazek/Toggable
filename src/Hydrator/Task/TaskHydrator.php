<?php

namespace Marek\Toggable\Hydrator\Task;

use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class TaskHydrator
 * @package Marek\Toggable\Hydrator\Task
 */
class TaskHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof Task) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof Task) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }
}
