<?php

namespace Marek\Toggable\API\Toggl\Values\Tag;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Tag
 * @package Marek\Toggable\API\Toggl\Values\Tag
 *
 * @property-read int $id
 * @property-read string $name
 * @property-read int $wid
 */
class Tag extends ValueObject
{
    /**
     * @var int
     */
    public $id;

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
}
