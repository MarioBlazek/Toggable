<?php

namespace Marek\Toggable\API\Http\Response\Tag;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class Tag
 * @package Marek\Toggable\API\Http\Response\Tag
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Tag\Tag $tag
 */
class Tag extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Tag\Tag
     */
    public $tag;
}
