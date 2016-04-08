<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

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
     * @var string
     */
    public $tagAction;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Tag\Tag[]
     */
    public $tags;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry[]
     */
    public $timeEntries;

    /**
     * @var boolean
     */
    public $hasData = true;

    /**
     * BulkUpdateTimeEntriesTags constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $entryIds = array();
        foreach ($this->timeEntries as $timeEntry) {
            $entryIds[] = $timeEntry->id;
        }

        $entryIds = implode(',', $entryIds);

        $this->uri = str_replace('{time_entry_ids}', $entryIds, $this->uri);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        // '{"time_entry":{"tags":["billed","productive"], "tag_action": "add"}}'
    }
}
