<?php

namespace Marek\Toggable\Hydrator;

use ReflectionClass;
use ReflectionProperty;
use ArrayObject;
use BadMethodCallException;
use InvalidArgumentException;

/**
 * Class ObjectProperty
 * @package Marek\Toggable\Hydrator
 */
class ObjectProperty implements HydratorInterface, StrategyEnabledInterface
{
    /**
    * The list with strategies that this hydrator has.
    *
    * @var \ArrayObject
    */
    protected $strategies;

    /**
     * ObjectProperty constructor.
     */
    public function __construct()
    {
        $this->strategies = new ArrayObject();
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!is_object($object)) {
            throw new BadMethodCallException(
                sprintf('%s expects the provided $object to be a PHP object)', __METHOD__)
            );
        }

        $properties = $this->getObjectProperties($object);

        $data = array();
        foreach ($properties as $name => $value) {

            if (!empty($object->$name) || $object->$name === false) {
                $data[$name] = $this->extractValue($name, $object->$name);
            }

        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function hydrate(array $data, $object)
    {
        if (!is_object($object)) {
            throw new BadMethodCallException(
                sprintf('%s expects the provided $object to be a PHP object)', __METHOD__)
            );
        }

        $props = $this->getObjectProperties($object);

        foreach ($data as $name => $value) {

            if (!isset($props[$name])) {
                continue;
            }

            $object->$name = $this->hydrateValue($name, $value);
        }

        return $object;
    }

    /**
     * @inheritDoc
     */
    public function canHydrate($object)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function addStrategy($name, StrategyInterface $strategy)
    {
        $this->strategies[$name] = $strategy;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStrategy($name)
    {
        return $this->strategies[$name];
    }

    /**
     * @inheritDoc
     */
    public function hasStrategy($name)
    {
        return array_key_exists($name, $this->strategies);
    }

    /**
     * @inheritDoc
     */
    public function removeStrategy($name)
    {
        unset($this->strategies[$name]);

        return $this;
    }

    /**
     * Converts a value for extraction. If no strategy exists the plain value is returned.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return mixed
     */
    public function extractValue($name, $value)
    {
        if ($this->hasStrategy($name)) {
            $strategy = $this->getStrategy($name);
            $value = $strategy->extract($value);
        }

        return $value;
    }

    /**
     * Converts a value for hydration. If no strategy exists the plain value is returned.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return mixed
     */
    public function hydrateValue($name, $value)
    {
        if ($this->hasStrategy($name)) {
            $strategy = $this->getStrategy($name);
            $value = $strategy->hydrate($value);
        }

        return $value;
    }

    /**
     * Return list of object properties
     *
     * @param object $object
     *
     * @return array
     */
    protected function getObjectProperties($object)
    {
        $reflection = new ReflectionClass($object);

        $properties = $reflection->getProperties(
            ReflectionProperty::IS_PRIVATE
            + ReflectionProperty::IS_PROTECTED
        );

        $props = array();
        /** @var ReflectionProperty $property */
        foreach ($properties as $property) {
            $props[$property->getName()] = true;
        }

        return $props;
    }
}
