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
    protected $uri = 'time_entries';

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $endDate;

    /**
     * GetTimeEntriesInDateRange constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
    }

    /**
     * @inheritdoc
     */
    public function getUri()
    {
        if (!$this->startDate instanceof \DateTime) {
            return $this->uri;
        }

        if (!$this->endDate instanceof \DateTime) {
            $this->endDate = new \DateTime();
        }

        $queryString = '?start_date=' . $this->startDate->format('c') . '&end_date=' . $this->endDate->format('c');

        return urlencode($this->uri . $queryString);
    }
}
