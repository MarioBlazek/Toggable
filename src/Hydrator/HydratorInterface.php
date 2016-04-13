<?php

namespace Marek\Toggable\Hydrator;

/**
 * Interface HydratorInterface
 * @package Marek\Toggable\Hydrator
 */
interface HydratorInterface
{
    /**
     * Hydrates data to object
     *
     * @param array $data
     *
     * @param $object
     */
    public function hydrate(array $data, $object);

    /**
     * Hydrates object to array
     *
     * @param $object
     *
     * @return array
     */
    public function extract($object);
}
