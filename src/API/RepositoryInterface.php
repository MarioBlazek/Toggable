<?php

namespace Marek\Toggl\API;

interface RepositoryInterface
{
    // Authentication part
    public function me();

    public function createSession();

    public function destroySession();


    // Clients part
    public function createClient();

    public function getClientDetails();

    public function updateClient();

    public function deleteClient();

    public function listClients();

    public function getClientProjects();


    // Dashboard part
    public function getDashboardData();


    // Project users
    public function createProjectUser();

    public function updateProjectUser();

    public function deleteProjectUser();

    public function createProjectUsers();

    public function updateProjectUsers();

    public function deleteProjectUsers();


    // Projects part
    public function createProject();

    public function getProjectData();

    public function updateProjectData();

    public function deleteProject();

    public function getProjectUsers();

    public function getProjectTasks();

    public function deleteProjects();


    // Tags part
    public function createTag();

    public function updateTag();

    public function deleteTag();

    // Task part
    public function createTask();

    public function getTaskDetails();

    public function updateTask();

    public function deleteTask();

    public function updateTasks();

    public function deleteTasks();

    // TIME ENTRIES
    // USERS
    // WORKSPACE USERS
    // WORKSPACES
}
