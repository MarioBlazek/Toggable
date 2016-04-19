<?php

namespace Marek\Toggable\API\Exception;

/**
 * Class InvalidArgumentException
 * @package Marek\Toggable\API\Exception
 */
class InvalidArgumentException extends \InvalidArgumentException
{
    /**
     * InvalidArgumentException constructor.
     *
     * @param string $property
     * @param string $class
     */
    public function __construct($property, $class)
    {
        $this->message = sprintf('$%s argument not provided in %s', $property, $class);
    }
}
