<?php

namespace Marek\Toggable\Hydrator;

/**
 * Interface StrategyEnabledInterface
 * @package Marek\Toggable\Hydrator
 */
interface StrategyEnabledInterface
{
    /**
     * Adds the given strategy under the given name.
     *
     * @param string $name
     * @param StrategyInterface $strategy
     *
     * @return self
     */
    public function addStrategy($name, StrategyInterface $strategy);

    /**
     * Gets the strategy with the given name.
     *
     * @param string $name
     *
     * @return StrategyInterface
     */
    public function getStrategy($name);

    /**
     * Checks if the strategy with the given name exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasStrategy($name);

    /**
     * Removes the strategy with the given name.
     *
     * @param string $name
     * 
     * @return self
     */
    public function removeStrategy($name);
}
