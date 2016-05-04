<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class BulkUpdateTimeEntriesTags
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 *
 * @property-read array $timeEntryIds
 */
class BulkUpdateTimeEntriesTags extends Request
{
    /**
     * @var string
     */
    public $uri = 'time_entries/{time_entry_ids}';

    /**
     * @var string
     */
    public $method = Request::PUT;

    /**
     * @var array
     */
    public $timeEntryIds;

    /**
     * BulkUpdateTimeEntriesTags constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $entryIds = implode(',', $this->timeEntryIds);

        $this->uri = str_replace('{time_entry_ids}', $entryIds, $this->uri);
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array('time_entry' => $this->data);
    }
}
