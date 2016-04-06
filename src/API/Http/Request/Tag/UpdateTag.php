<?php

namespace Marek\Toggable\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class UpdateTag
 * @package Marek\Toggable\API\Http\Request\Tag
 * 
 * @property-read int $clientId
 */
class UpdateTag extends CreateTag
{
    /**
     * @var string
     */
    public $uri = 'tags/{tag_id}';

    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var int
     */
    public $tagId;

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
