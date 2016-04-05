<?php

namespace Marek\Toggable\API\Toggl\Values\Client;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Client
 * @package Marek\Toggable\API\Toggl\Values\Client
 *
 * @property-read int $id
 * @property-read int $guid
 * @property-read int $wid
 * @property-read string $name
 * @property-read \DateTime $at
 * @property-read string $notes
 * @property-read float $hrate
 * @property-read string $cur
 */
class Client extends ValueObject
{
    const ACTIVE = 'true';
    const NON_ACTIVE = 'false';
    const BOTH = 'both';

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $guid;

    /**
     * @var int
     */
    public $wid;

    /**
     * @var string
     */
    public $name;

    /**
     * @var \DateTime
     */
    public $at;

    /**
     * @var string
     */
    public $notes;

    /**
     * @var float
     */
    public $hrate;

    /**
     * @var string
     */
    public $cur;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $className = get_class($this);
        $classProperties = get_class_vars($className);

        $data =  array();
        foreach ($classProperties as $propertyName => $propertyValue) {

            if (!empty($this->$propertyName)) {

                $data[$propertyName] = $this->$propertyName;

            } else if ($this->$propertyName instanceof \DateTime) {

                $data[$propertyName] = $this->$propertyName->format('c');

            }
        }

        return $data;
    }
}
