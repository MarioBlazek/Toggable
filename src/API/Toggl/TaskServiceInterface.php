<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface TaskServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface TaskServiceInterface
{
    public function createTask();

    public function getTaskDetails();

    public function updateTask();

    public function deleteTask();

    public function updateMultipleTasks();

    public function deleteMultipleTasks();
}
