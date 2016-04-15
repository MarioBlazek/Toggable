<?php

namespace Marek\Toggable\Hydrator\Tag;

use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class TagHydrator
 * @package Marek\Toggable\Hydrator\Tag
 */
class TagHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof Tag) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof Tag) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }
}
