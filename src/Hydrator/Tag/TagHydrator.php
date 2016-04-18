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
    public function canHydrate($object)
    {
        if ($object instanceof Tag) {
            return true;
        }

        return false;
    }
}
