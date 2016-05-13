<?php

namespace Marek\Toggable\Hydrator;

/**
 * Interface StrategyInterface
 * @package Marek\Toggable\Hydrator
 */
interface StrategyInterface
{
    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param object $value
     *
     * @return array
     */
    public function extract($value);

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param array $value
     *
     * @return object
     */
    public function hydrate($value);
}
