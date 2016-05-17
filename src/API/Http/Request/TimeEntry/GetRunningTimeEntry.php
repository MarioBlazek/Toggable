<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetRunningTimeEntry
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 */
class GetRunningTimeEntry extends Request
{
    /**
     * @var string
     */
    protected $uri = 'time_entries/current';

    /**
     * @var string
     */
    protected $method = Request::GET;
}
