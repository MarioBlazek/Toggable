<?php

namespace Marek\Toggable\Service\TimeEntry;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Request\RequestInterface;
use Marek\Toggable\API\Http\Request\TimeEntry\BulkUpdateTimeEntriesTags;
use Marek\Toggable\API\Http\Request\TimeEntry\CreateTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\DeleteTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\GetRunningTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\GetTimeEntriesStartedInDateRange;
use Marek\Toggable\API\Http\Request\TimeEntry\GetTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\StartTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\StopTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\UpdateTimeEntry;
use Marek\Toggable\API\Http\Response\TimeEntry\TimeEntries;
use Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry as TimeEntryResponse;
use Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry;
use Marek\Toggable\Service\AbstractService;

/**
 * Class TimeEntryService
 * @package Marek\Toggable\Service\TimeEntry
 */
class TimeEntryService extends AbstractService implements \Marek\Toggable\API\Toggl\TimeEntryServiceInterface
{
    /**
     * @inheritDoc
     */
    public function createTimeEntry(\Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry)
    {
        $request = new CreateTimeEntry(
            array(
                'data' => $this->extractDataFromObject($timeEntry),
            )
        );

      return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function startTimeEntry(\Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry)
    {
        $request = new StartTimeEntry(
            array(
                'data' => $this->extractDataFromObject($timeEntry),
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function stopTimeEntry($timeEntryId)
    {
        if (empty($timeEntryId) || !is_int($timeEntryId)) {
            throw new InvalidArgumentException(
                sprintf('$timeEntryId argument not provided in %s', get_class($this))
            );
        }

        $request = new StopTimeEntry(
            array(
                'timeEntryId' => $timeEntryId,
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function getTimeEntry($timeEntryId)
    {
        if (empty($timeEntryId) || !is_int($timeEntryId)) {
            throw new InvalidArgumentException(
                sprintf('$timeEntryId argument not provided in %s', get_class($this))
            );
        }

        $request = new GetTimeEntry(
            array(
                'timeEntryId' => $timeEntryId,
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function getRunningTimeEntry()
    {
        $request = new GetRunningTimeEntry();

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function updateTimeEntry($timeEntryId, \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry)
    {
        if (empty($timeEntryId) || !is_int($timeEntryId)) {
            throw new InvalidArgumentException(
                sprintf('$timeEntryId argument not provided in %s', get_class($this))
            );
        }

        $request = new UpdateTimeEntry(
            array(
                'timeEntryId'   => $timeEntryId,
                'data'          => $this->extractDataFromObject($timeEntry),
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function deleteTimeEntry($timeEntryId)
    {
        if (empty($timeEntryId) || !is_int($timeEntryId)) {
            throw new InvalidArgumentException(
                sprintf('$timeEntryId argument not provided in %s', get_class($this))
            );
        }

        $request = new DeleteTimeEntry(
            array(
                'timeEntryId'   => $timeEntryId,
            )
        );

        return $this->delegate($request);
    }

    /**
     * @inheritDoc
     */
    public function getTimeEntriesStartedInDateRange(\DateTime $startDate, \DateTime $endDate)
    {
        $request = new GetTimeEntriesStartedInDateRange(
            array(
                'startDate' => $startDate,
                'endDate'   => $endDate,
            )
        );

        $response = $this->delegate($request);

        $entries = array();
        foreach ($response->body as $entry) {
            $entries[] = $this->hydrator->hydrate($entry, new TimeEntry());
        }

        return new TimeEntries(
            array(
                'timeEntries' => $entries,
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function bulkUpdateTimeEntriesTags(array $timeEntries, array $tags, $tagAction = \Marek\Toggable\API\Toggl\Values\TagAction::ADD)
    {
        $data = array(
            'tags' => $tags,
            'tag_action' => $tagAction
        );

        $request = new BulkUpdateTimeEntriesTags(
            array(
                'timeEntryIds'   => $timeEntries,
                'data'           => $data,
            )
        );

        $response = $this->delegate($request);

        $entries = array();
        foreach ($response->body['data'] as $entry) {
            $entries[] = $this->hydrator->hydrate($entry, new TimeEntry());
        }

        return new TimeEntries(
            array(
                'timeEntries' => $entries,
            )
        );
    }

    /**
     * Response helper method
     *
     * @param \Marek\Toggable\API\Http\Request\RequestInterface $request
     *
     * @return \Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry
     */
    protected function delegateHydrateAndReturnResponse(RequestInterface $request)
    {
        $response = $this->delegate($request);

        return new TimeEntryResponse(
            array(
                'timeEntry' => $this->hydrateDataFromArrayToObject($response, new TimeEntry()),
            )
        );
    }
}
