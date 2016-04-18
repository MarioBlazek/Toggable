<?php

namespace Marek\Toggable\Hydrator;

/**
 * Class AggregateHydrator
 * @package Marek\Toggable\Hydrator
 */
class AggregateHydrator implements HydratorInterface
{
    /**
     * @var HydratorInterface[]
     */
    private $hydrators;

    /**
     * @param \Marek\Toggable\Hydrator\HydratorInterface $hydrator
     */
    public function add(HydratorInterface $hydrator)
    {
        $this->hydrators[] = $hydrator;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        foreach($this->hydrators as $hydrator) {
            if ($hydrator->canHydrate($object)) {
                return $hydrator->extract($object);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        foreach($this->hydrators as $hydrator) {
            if ($hydrator->canHydrate($object)) {
                return $hydrator->hydrate($data, $object);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function canHydrate($object)
    {
        return true;
    }
}
