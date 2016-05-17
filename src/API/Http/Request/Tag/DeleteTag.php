<?php

namespace Marek\Toggable\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DeleteTag
 * @package Marek\Toggable\API\Http\Request\Tag
 *
 * @property-read int $tagId
 */
class DeleteTag extends Request
{
    /**
     * @var string
     */
    protected $method = Request::DELETE;

    /**
     * @var string
     */
    protected $uri = 'tags/{tag_id}';

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
