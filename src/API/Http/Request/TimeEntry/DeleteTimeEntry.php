<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DeleteTimeEntry
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 */
class DeleteTimeEntry extends GetTimeEntry
{
    /**
     * @var string
     */
    protected $method = Request::DELETE;
}
