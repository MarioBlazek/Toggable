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
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof Workspace) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof Workspace) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }
}
