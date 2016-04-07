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
    public $uri = 'time_entries/current';

    /**
     * @var string
     */
    public $method = Request::GET;
}
