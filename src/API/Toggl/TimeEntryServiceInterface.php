<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface TimeEntryServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface TimeEntryServiceInterface
{
    /**
     * Creates new TimeEntry
     *
     * @param \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry
     *
     * @return \Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry
     */
    public function createTimeEntry(\Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry);

    /**
     * Starts time tracking
     *
     * @param \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry
     *
     * @return \Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry
     */
    public function startTimeEntry(\Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry);

    /**
     * Stops time tracking
     *
     * @param int $timeEntryId
     *
     * @return \Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry
     */
    public function stopTimeEntry($timeEntryId);

    /**
     * Gets TimeEntry details by id
     *
     * @param int $timeEntryId
     *
     * @return \Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry
     */
    public function getTimeEntry($timeEntryId);

    /**
     * Returns currently active TimeEntry
     *
     * @return \Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry
     */
    public function getRunningTimeEntry();

    /**
     * Updates TimeEntry
     *
     * @param int $timeEntryId
     * @param \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry
     *
     * @return \Marek\Toggable\API\Http\Response\TimeEntry\TimeEntry
     */
    public function updateTimeEntry($timeEntryId, \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry $timeEntry);

    /**
     * Deletes TimeEntry by id
     *
     * @param int $timeEntryId
     *
     * @return \Marek\Toggable\API\Http\Response\Successful
     */
    public function deleteTimeEntry($timeEntryId);
}
