<?php

namespace Marek\Toggable\Service\TimeEntry;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Request\TimeEntry\CreateTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\DeleteTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\GetRunningTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\GetTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\StartTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\StopTimeEntry;
use Marek\Toggable\API\Http\Request\TimeEntry\UpdateTimeEntry;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry as TimeEntryResponse;
use Marek\Toggable\API\Toggl\TimeEntryServiceInterface;
use Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry;
use Marek\Toggable\Http\RequestManagerInterface;
use Zend\Hydrator\ObjectProperty;

/**
 * Class TimeEntryService
 * @package Marek\Toggable\Service\TimeEntry
 */
class TimeEntryService implements TimeEntryServiceInterface
{
    /**
     * @var \Marek\Toggable\Http\RequestManagerInterface
     */
    private $requestManager;

    /**
     * TimeEntryService constructor.
     *
     * @param \Marek\Toggable\Http\RequestManagerInterface $requestManager
     */
    public function __construct(RequestManagerInterface $requestManager)
    {
        $this->requestManager = $requestManager;
    }

    /**
     * @inheritDoc
     */
    public function createTimeEntry(\Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry)
    {
        $request = new CreateTimeEntry(array(
            'timeEntry' => $timeEntry,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $timeEntry = (new ObjectProperty())->hydrate($response->body['data'], new TimeEntry());

        return new TimeEntryResponse(array(
            'timeEntry' => $timeEntry,
        ));
    }

    /**
     * @inheritDoc
     */
    public function startTimeEntry(\Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry)
    {
        $request = new StartTimeEntry(array(
            'timeEntry' => $timeEntry,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $timeEntry = (new ObjectProperty())->hydrate($response->body['data'], new TimeEntry());

        return new TimeEntryResponse(array(
            'timeEntry' => $timeEntry,
        ));
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

        $request = new StopTimeEntry(array(
            'timeEntryId' => $timeEntryId,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $timeEntry = (new ObjectProperty())->hydrate($response->body['data'], new TimeEntry());

        return new TimeEntryResponse(array(
            'timeEntry' => $timeEntry,
        ));
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

        $request = new GetTimeEntry(array(
            'timeEntryId' => $timeEntryId,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $timeEntry = (new ObjectProperty())->hydrate($response->body['data'], new TimeEntry());

        return new TimeEntryResponse(array(
            'timeEntry' => $timeEntry,
        ));
    }

    /**
     * @inheritDoc
     */
    public function getRunningTimeEntry()
    {
        $request = new GetRunningTimeEntry();

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $timeEntry = (new ObjectProperty())->hydrate($response->body['data'], new TimeEntry());

        return new TimeEntryResponse(array(
            'timeEntry' => $timeEntry,
        ));
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

        $request = new UpdateTimeEntry(array(
            'timeEntryId'   => $timeEntryId,
            'timeEntry'     => $timeEntry,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $timeEntry = (new ObjectProperty())->hydrate($response->body['data'], new TimeEntry());

        return new TimeEntryResponse(array(
            'timeEntry' => $timeEntry,
        ));
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

        $request = new DeleteTimeEntry(array(
            'timeEntryId'   => $timeEntryId,
        ));

        $response = $this->requestManager->request($request);

        return $response;
    }


}
