<?php

namespace Marek\Toggable\Hydrator\Workspace;

use Marek\Toggable\API\Toggl\Values\Workspace\Workspace;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class WorkspaceHydrator
 * @package Marek\Toggable\Hydrator\Workspace
 */
class WorkspaceHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function canHydrate($object)
    {
        if ($object instanceof Workspace) {
            return true;
        }

        return false;
    }
}
