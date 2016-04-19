<?php

namespace Marek\Toggable\API\Toggl\Values\Tag;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Tag
 * @package Marek\Toggable\API\Toggl\Values\Tag
 *
 * @property-read int $id
 * @property-read int $guid
 * @property-read string $name
 * @property-read int $wid
 * @property-read \DateTime $at
 */
class Tag extends ValueObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $guid;

    /**
     * The name of the tag
     *
     * @var string
     */
    public $name;

    /**
     * Workspace ID, where the tag will be used
     *
     * @var int
     */
    public $wid;

    /**
     * @var \DateTime
     */
    public $at;
}
