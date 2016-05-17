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
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $guid;

    /**
     * @var int
     */
    protected $wid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateTime
     */
    protected $at;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var float
     */
    protected $hrate;

    /**
     * @var string
     */
    protected $cur;
}
