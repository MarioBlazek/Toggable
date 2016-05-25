<?php

namespace Marek\Toggable\Service\Task;

use Marek\Toggable\API\Http\Request\Task\BulkDeleteTasks;
use Marek\Toggable\API\Http\Request\Task\BulkUpdateTasks;
use Marek\Toggable\API\Http\Request\Task\CreateTask;
use Marek\Toggable\API\Http\Request\Task\DeleteTask;
use Marek\Toggable\API\Http\Request\Task\GetTask;
use Marek\Toggable\API\Http\Request\Task\UpdateTask;
use Marek\Toggable\API\Http\Response\Task\Task as TaskResponse;
use Marek\Toggable\API\Http\Response\Task\Tasks as TasksResponse;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\Service\AbstractService;

/**
 * Class TaskService
 * @package Marek\Toggable\Service\Task
 */
class TaskService extends AbstractService implements \Marek\Toggable\API\Toggl\TaskServiceInterface
{
    /**
     * @inheritDoc
     */
    public function createTask(\Marek\Toggable\API\Toggl\Values\Task\Task $task)
    {
        $request = new CreateTask(
            array(
                'data' => $this->extractDataFromObject($task),
            )
        );

        $response = $this->delegate($request);

        return new TaskResponse(
            array(
                'task' => $this->hydrateDataFromArrayToObject($response, new Task())
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function getTask($taskId)
    {
        $request = new GetTask(
            array(
                'taskId' => $this->validate($taskId),
            )
        );

        $response = $this->delegate($request);

        return new TaskResponse(
            array(
                'task' => $this->hydrateDataFromArrayToObject($response, new Task())
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function updateTask($taskId, \Marek\Toggable\API\Toggl\Values\Task\Task $task)
    {
        $request = new UpdateTask(
            array(
                'taskId' => $this->validate($taskId),
                'data' => $task,
            )
        );

        $response = $this->delegate($request);

        return new TaskResponse(
            array(
                'task' => $this->hydrateDataFromArrayToObject($response, new Task())
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function deleteTask($taskId)
    {
        $request = new DeleteTask(
            array(
                'taskId' => $this->validate($taskId),
            )
        );

        return $this->delegate($request);
    }

    /**
     * @inheritDoc
     */
    public function updateMultipleTasks($taskIds, \Marek\Toggable\API\Toggl\Values\Task\Task $task)
    {
        $request = new BulkUpdateTasks(
            array(
                'taskIds' => $taskIds,
                'data' => $task,
            )
        );

        $response = $this->delegate($request);

        $tasks = array();
        foreach ($response->body as $task) {
            $tasks[] = $this->hydrator->hydrate($task, new Task());
        }

        return new TasksResponse(
            array(
                'tasks' => $tasks,
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function deleteMultipleTasks($taskIds)
    {
        $request = new BulkDeleteTasks(
            array(
                'taskIds' => $taskIds,
            )
        );

        return $this->delegate($request);
    }

}
