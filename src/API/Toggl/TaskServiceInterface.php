<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface TaskServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface TaskServiceInterface
{
    /**
     * Creates new Task
     *
     * @param \Marek\Toggable\API\Toggl\Values\Task\Task $task
     *
     * @return \Marek\Toggable\API\Http\Response\Task\Task
     */
    public function createTask(\Marek\Toggable\API\Toggl\Values\Task\Task $task);

    /**
     * Returns Task details
     *
     * @param int $taskId
     *
     * @return \Marek\Toggable\API\Http\Response\Task\Task
     */
    public function getTask($taskId);

    /**
     * Updates Task by task id
     *
     * @param int $taskId
     * @param \Marek\Toggable\API\Toggl\Values\Task\Task $task
     *
     * @return \Marek\Toggable\API\Http\Response\Task\Task
     */
    public function updateTask($taskId, \Marek\Toggable\API\Toggl\Values\Task\Task $task);

    /**
     * Deletes Task by task id
     *
     * @param int $taskId
     *
     * @return \Marek\Toggable\API\Http\Response\Task\Task
     */
    public function deleteTask($taskId);

    /**
     * Updates multiple Tasks
     *
     * @param array $taskIds
     * @param \Marek\Toggable\API\Toggl\Values\Task\Task $task
     *
     * @return \Marek\Toggable\API\Http\Response\Task\Tasks
     */
    public function updateMultipleTasks($taskIds, \Marek\Toggable\API\Toggl\Values\Task\Task $task);

    /**
     * Deletes multiple Tasks
     *
     * @param array $taskIds
     *
     * @return \Marek\Toggable\API\Http\Response\ResponseInterface
     */
    public function deleteMultipleTasks($taskIds);
}
