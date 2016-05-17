<?php

namespace Marek\Toggable\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateTag
 * @package Marek\Toggable\API\Http\Request\Tag
 * 
 * @property-read int $tagId
 */
class UpdateTag extends CreateTag
{
    /**
     * @var string
     */
    protected $uri = 'tags/{tag_id}';

    /**
     * @var string
     */
    protected $method = Request::PUT;

    /**
     * @var int
     */
    protected $tagId;

    /**
     * UpdateTag constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $this->uri = str_replace('{tag_id}', $this->tagId, $this->uri);
    }
}
