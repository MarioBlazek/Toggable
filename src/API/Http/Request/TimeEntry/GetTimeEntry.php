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
    protected $uri = 'time_entries/{time_entry_id}';

    /**
     * @var string
     */
    protected $method = Request::GET;
}
