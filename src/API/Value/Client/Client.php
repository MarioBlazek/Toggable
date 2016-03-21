<?php

namespace Marek\Toggl\API\Value\Client;

use Marek\Toggl\API\Value\ValueObject;

/**
 * Class Client
 * @package Marek\Toggl\API\Value\Client
 *
 * @property-read int $id
 * @property-read int $wid
 * @property-read string $name
 * @property-read \DateTime $at
 * @property-read string $notes
 * @property-read float $hrate
 * @property-read string $cur
 */
class Client extends ValueObject
{
    /**
     * @var int
     */
    public $id;

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
}
