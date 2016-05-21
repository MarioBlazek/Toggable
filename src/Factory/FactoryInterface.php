<?php

namespace Marek\Toggable\Factory;

/**
 * Interface FactoryInterface
 * @package Marek\Toggable\Factory
 */
interface FactoryInterface
{
    /**
     * Returns builded object
     *
     * @return object
     */
    public function build();
}
