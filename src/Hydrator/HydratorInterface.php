<?php

namespace Marek\Toggable\Hydrator;

/**
 * Interface HydratorInterface
 * @package Marek\Toggable\Hydrator
 */
interface HydratorInterface
{
    /**
     * Extracts data from object
     *
     * @param $object
     *
     * @return array
     */
    public function extract($object);

    /**
     * Hydrates array data to object
     *
     * @param array $data
     * @param $object
     *
     * @return $object
     */
    public function hydrate(array $data, $object);

    /**
     * Checks if given object can be hydrated/extracted by current hydrator
     *
     * @param $object
     *
     * @return boolean
     */
    public function canHydrate($object);
}
