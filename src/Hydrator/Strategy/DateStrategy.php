<?php

namespace Marek\Toggable\Hydrator\Strategy;

use Zend\Hydrator\Strategy\DefaultStrategy;
use DateTime;

/**
 * Class DateStrategy
 * @package Marek\Toggable\Hydrator\Strategy
 */
class DateStrategy extends DefaultStrategy
{
    /**
     * {@inheritdoc}
     */
    public function hydrate($value)
    {
        if (is_string($value)) {
            $value = new DateTime();
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
