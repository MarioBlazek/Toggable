<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetTimeEntry
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 */
class GetTimeEntry extends StopTimeEntry
{
    /**
     * @var string
     */
    public $uri = 'time_entries/{time_entry_id}';

    /**
     * @var string
     */
    public $method = Request::GET;
}
