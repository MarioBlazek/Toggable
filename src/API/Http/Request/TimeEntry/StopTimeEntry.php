<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class StopTimeEntry
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 *
 * @property-read int $timeEntryId
 */
class StopTimeEntry extends Request
{
    /**
     * @var string
     */
    protected $uri = 'time_entries/{time_entry_id}/stop';

    /**
     * @var string
     */
    protected $method = Request::PUT;

    /**
     * @var int
     */
    protected $timeEntryId;

    /**
     * StopTimeEntry constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
        $this->uri = str_replace('{time_entry_id}', $this->timeEntryId, $this->uri);
    }
}
