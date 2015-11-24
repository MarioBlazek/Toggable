<?php

namespace Marek\Toggl\API;

use Marek\Toggl\Http\HttpClientInterface;
use Marek\Toggl\Http\Value\Request\Request;
use Marek\Toggl\Http\Value\TransportValue;

class Repository implements RepositoryInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function me()
    {
        $transport = new TransportValue('me', new Request());

        return $this->client->get($transport);
    }

    public function createSession()
    {
        // TODO: Implement createSession() method.
    }

    public function destroySession()
    {
        // TODO: Implement destroySession() method.
    }

    public function createClient()
    {
        // TODO: Implement createClient() method.
    }

    public function getClientDetails()
    {
        // TODO: Implement getClientDetails() method.
    }

    public function updateClient()
    {
        // TODO: Implement updateClient() method.
    }

    public function deleteClient()
    {
        // TODO: Implement deleteClient() method.
    }

    public function listClients()
    {
        // TODO: Implement listClients() method.
    }

    public function getClientProjects()
    {
        // TODO: Implement getClientProjects() method.
    }

    public function getDashboardData()
    {
        // TODO: Implement getDashboardData() method.
    }

    public function createProjectUser()
    {
        // TODO: Implement createProjectUser() method.
    }

    public function updateProjectUser()
    {
        // TODO: Implement updateProjectUser() method.
    }

    public function deleteProjectUser()
    {
        // TODO: Implement deleteProjectUser() method.
    }

    public function createProjectUsers()
    {
        // TODO: Implement createProjectUsers() method.
    }

    public function updateProjectUsers()
    {
        // TODO: Implement updateProjectUsers() method.
    }

    public function deleteProjectUsers()
    {
        // TODO: Implement deleteProjectUsers() method.
    }

    public function createProject()
    {
        // TODO: Implement createProject() method.
    }

    public function getProjectData()
    {
        // TODO: Implement getProjectData() method.
    }

    public function updateProjectData()
    {
        // TODO: Implement updateProjectData() method.
    }

    public function deleteProject()
    {
        // TODO: Implement deleteProject() method.
    }

    public function getProjectUsers()
    {
        // TODO: Implement getProjectUsers() method.
    }

    public function getProjectTasks()
    {
        // TODO: Implement getProjectTasks() method.
    }

    public function deleteProjects()
    {
        // TODO: Implement deleteProjects() method.
    }

    public function createTag()
    {
        // TODO: Implement createTag() method.
    }

    public function updateTag()
    {
        // TODO: Implement updateTag() method.
    }

    public function deleteTag()
    {
        // TODO: Implement deleteTag() method.
    }

    public function createTask()
    {
        // TODO: Implement createTask() method.
    }

    public function getTaskDetails()
    {
        // TODO: Implement getTaskDetails() method.
    }

    public function updateTask()
    {
        // TODO: Implement updateTask() method.
    }

    public function deleteTask()
    {
        // TODO: Implement deleteTask() method.
    }

    public function updateTasks()
    {
        // TODO: Implement updateTasks() method.
    }

    public function deleteTasks()
    {
        // TODO: Implement deleteTasks() method.
    }
}
