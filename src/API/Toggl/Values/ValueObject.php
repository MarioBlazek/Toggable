<?php

namespace Marek\Toggable\API\Toggl\Values;

use Marek\Toggable\API\Exception\PropertyNotFoundException;

/**
 * Class ValueObject
 * @package Marek\Toggable\API\Toggl\Values
 */
abstract class ValueObject
{
    /**
     * Construct object optionally with a set of properties.
     *
     * Readonly properties values must be set using $properties as they are not writable anymore
     * after object has been created.
     *
     * @param array $properties
     *
     * @throws \Marek\Toggable\API\Exception\PropertyNotFoundException
     */
    public function __construct(array $properties = array())
    {
        foreach ($properties as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            } else {
                throw new PropertyNotFoundException($property, get_class($this));
            }
        }
    }


    /**
     * @param $property
     *
     * @return mixed
     *
     * @throws \Marek\Toggable\API\Exception\PropertyNotFoundException
     * @throws \Marek\Toggable\API\Exception\PropertyReadOnlyException
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {

            return $this->$property;

        }
        throw new PropertyNotFoundException($property, get_class($this));
    }

    /**
     * @param $property
     * @param $value
     *
     * @return mixed
     *
     * @throws \Marek\Toggable\API\Exception\PropertyNotFoundException
     * @throws \Marek\Toggable\API\Exception\PropertyReadOnlyException
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
     * Magic isset function handling isset() to non public properties
     *
     * @param string $property
     *
     * @return boolean
     */
    public function __isset($property)
    {
        return !empty($this->$property);
    }
}
