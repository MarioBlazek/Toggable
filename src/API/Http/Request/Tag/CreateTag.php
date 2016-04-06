<?php

namespace Marek\Toggable\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateTag
 * @package Marek\Toggable\API\Http\Request\Tag
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Tag\Tag $tag
 */
class CreateTag extends Request
{
    /**
     * @var string
     */
    public $uri = 'tags';

    /**
     * @var string
     */
    public $method = Request::POST;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Tag\Tag
     */
    public $tag;

    /**
     * @var boolean
     */
    public $hasData = true;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return array('tag' => $this->tag->toArray());
    }
}
