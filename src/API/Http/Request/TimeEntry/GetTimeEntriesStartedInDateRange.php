<?php

namespace Marek\Toggable\API\Http\Request\TimeEntry;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetTimeEntriesStartedInDateRange
 * @package Marek\Toggable\API\Http\Request\TimeEntry
 *
 * @property-read \DateTime $startDate
 * @property-read \DateTime $endDate
 */
class GetTimeEntriesStartedInDateRange extends Request
{
    /**
     * @var string
     */
    public $uri = 'time_entries';

    /**
     * @var string
     */
    public $method = Request::GET;

    /**
     * @var \DateTime
     */
    public $startDate;

    /**
     * @var \DateTime
     */
    public $endDate;

    /**
     * GetTimeEntriesInDateRange constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
        $this->constructUrl();
    }

    /**
     * Constructs query part of URL
     */
    protected function constructUrl()
    {
        if (!$this->startDate instanceof \DateTime) {
            return;
        }

        if (!$this->endDate instanceof \DateTime) {
            $this->endDate = new \DateTime();
        }

        $queryString = '?start_date=' . $this->startDate->format('c') . '&end_date=' . $this->endDate->format('c');

        $this->uri = urlencode($this->uri . $queryString);
    }
}
