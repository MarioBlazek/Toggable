<?php

namespace Marek\Toggable\Hydrator\Strategy;

use DateTime;
use Marek\Toggable\Hydrator\StrategyInterface;

/**
 * Class DateStrategy
 * @package Marek\Toggable\Hydrator\Strategy
 */
class DateStrategy implements StrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrate($value)
    {
        if (is_string($value)) {
            $value = new DateTime($value);
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($value)
    {
        if ($value instanceof DateTime) {
            $value = $value->format('c');
        }

        return $value;
    }
}
