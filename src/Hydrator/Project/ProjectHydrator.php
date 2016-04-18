<?php

namespace Marek\Toggable\Hydrator\Project;

use Marek\Toggable\API\Toggl\Values\Project\Project;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class ProjectHydrator
 * @package Marek\Toggable\Hydrator\Project
 */
class ProjectHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function canHydrate($object)
    {
        if ($object instanceof Project) {
            return $object;
        }

        return false;
    }
}
