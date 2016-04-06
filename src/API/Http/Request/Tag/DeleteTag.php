<?php

namespace Marek\Toggable\API\Http\Request\Tag;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DeleteTag
 * @package Marek\Toggable\API\Http\Request\Tag
 */
class DeleteTag extends UpdateTag
{
    /**
     * @var string
     */
    public $method = Request::PUT;
}
