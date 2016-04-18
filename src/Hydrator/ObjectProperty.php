<?php

namespace Marek\Toggable\Hydrator;

use Zend\Stdlib\Exception;

/**
 * Class ObjectProperty
 * @package Marek\Toggable\Hydrator
 */
class ObjectProperty extends \Zend\Hydrator\ObjectProperty
{
    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!is_object($object)) {
            throw new Exception\BadMethodCallException(
                sprintf('%s expects the provided $object to be a PHP object)', __METHOD__)
            );
        }

        $data   = get_object_vars($object);
        $filter = $this->getFilter();

        $vars = array();
        foreach ($data as $name => $value) {
            // Filter keys, removing any we don't want
            if (! $filter->filter($name)) {
                unset($data[$name]);
                continue;
            }

            // Replace name if extracted differ
            $extracted = $this->extractName($name, $object);

            if ($extracted !== $name) {
                unset($data[$name]);
                $name = $extracted;
            }

            $data[$name] = $this->extractValue($name, $value, $object);

            if (!empty($data[$name])) {
                $vars[$name] = $data[$name];
            }
        }

        return $vars;
    }
}
