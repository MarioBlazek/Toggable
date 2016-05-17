<?php

namespace Marek\Toggable\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class CreateTag
 * @package Marek\Toggable\API\Http\Request\Tag
 */
class CreateTag extends Request
{
    /**
     * @var string
     */
    protected $uri = 'tags';

    /**
     * @var string
     */
    protected $method = Request::POST;

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('tag' => $this->data);
    }
}
