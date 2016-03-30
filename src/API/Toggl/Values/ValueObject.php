<?php

namespace Marek\Toggable\API\Toggl\Values;

use Marek\Toggable\Exception\PropertyNotFoundException;

abstract class ValueObject
{
    /**
     * Construct object optionally with a set of properties.
     *
     * Readonly properties values must be set using $properties as they are not writable anymore
     * after object has been created.
     *
     * @param array $properties
     */
    public function __construct(array $properties = array())
    {
        foreach ($properties as $property => $value) {
            $this->$property = $value;
        }
    }

    /**
     * @param $property
     * @param $value
     *
     * @throws \Marek\Toggable\Exception\PropertyNotFoundException
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            throw new PropertyNotFoundException($property, get_class($this));
        }
    }

    /**
     * @param $property
     *
     * @return mixed
     *
     * @throws \Marek\Toggable\Exception\PropertyNotFoundException
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        throw new PropertyNotFoundException($property, get_class($this));
    }

    /**
     * Magic isset function handling isset() to non public properties.
     *
     * Returns true for all (public/)protected/private properties.
     *
     * @ignore This method is for internal use
     *
     * @param string $property Name of the property
     *
     * @return bool
     */
    public function __isset($property)
    {
        return property_exists($this, $property);
    }

    /**
     * @param $property
     *
     * @throws \Marek\Toggable\Exception\PropertyNotFoundException
     */
    public function __unset($property)
    {
        $this->__set($property, NULL);
    }
}
