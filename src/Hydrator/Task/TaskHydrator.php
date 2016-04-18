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
    public function canHydrate($object)
    {
        if ($object instanceof Task) {
            return true;
        }

        return false;
    }
}
