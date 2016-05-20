<?php

namespace Marek\Toggable\Service\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\UpdateWorkspace;
use Marek\Toggable\API\Http\Request\Workspace\Workspaces as WorkspacesRequest;
use Marek\Toggable\API\Http\Request\Workspace\Workspace as WorkspaceRequest;
use Marek\Toggable\API\Http\Request\Workspace\WorkspaceUsers as WorkspaceUsersRequest;
use Marek\Toggable\API\Http\Request\Workspace\WorkspaceClients as WorkspaceClientsRequest;
use Marek\Toggable\API\Http\Request\Workspace\WorkspaceProjects as WorkspaceProjectsRequest;
use Marek\Toggable\API\Http\Request\Workspace\WorkspaceTasks as WorkspaceTasksRequest;
use Marek\Toggable\API\Http\Request\Workspace\WorkspaceTags as WorkspaceTagsRequest;
use Marek\Toggable\API\Http\Response\Workspace\Workspaces as WorkspacesResponse;
use Marek\Toggable\API\Http\Response\Workspace\Workspace as WorkspaceResponse;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceUsers as WorkspaceUsersResponse;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceClients as WorkspaceClientsResponse;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceProjects as WorkspaceProjectsResponse;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceTasks as WorkspaceTasksResponse;
use Marek\Toggable\API\Http\Response\Workspace\WorkspaceTags as WorkspaceTagsResponse;
use Marek\Toggable\API\Toggl\Values\Client\Client;
use Marek\Toggable\API\Toggl\Values\Project\Project;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Toggl\Values\Task\Task;
use Marek\Toggable\API\Toggl\Values\User\User;
use Marek\Toggable\API\Toggl\Values\Workspace\Workspace;
use Marek\Toggable\API\Toggl\Values\Activity;
use InvalidArgumentException;
use Marek\Toggable\Service\AbstractService;

/**
 * Class WorkspaceService
 * @package Marek\Toggable\Service\Client
 */
class WorkspaceService extends AbstractService implements \Marek\Toggable\API\Toggl\WorkspaceServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getWorkspaces()
    {
        $request = new WorkspacesRequest();

        $response = $this->delegate($request);
        
        $workspaces = array();
        foreach($response->body as $workspace) {
            $workspaces[] = $this->hydrator->hydrate($workspace, new Workspace());
        }

        return new WorkspacesResponse(
            array(
                'workspaces' => $workspaces,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspace($workspaceId)
    {
        $request = new WorkspaceRequest(
            array(
                'workspaceId' => $this->validate($workspaceId),
            )
        );

        $response = $this->delegate($request);

        $workspace = $this->hydrator->hydrate($response->body['data'], new Workspace());

        return new WorkspaceResponse(
            array(
                'workspace' => $workspace,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceUsers($workspaceId)
    {
        $request = new WorkspaceUsersRequest(
            array(
                'workspaceId' => $this->validate($workspaceId),
            )
        );

        $response = $this->delegate($request);

        $users = array();
        foreach($response->body as $user) {
            $users[] = $this->hydrator->hydrate($user, new User());
        }

        return new WorkspaceUsersResponse(
            array(
                'users' => $users,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceClients($workspaceId)
    {
        $request = new WorkspaceClientsRequest(
            array(
                'workspaceId' => $this->validate($workspaceId),
            )
        );

        $response = $this->delegate($request);

        $clients = array();
        foreach($response->body as $client) {
            $clients[] = $this->hydrator->hydrate($client, new Client());
        }

        return new WorkspaceClientsResponse(
            array(
                'clients' => $clients,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceProjects($workspaceId, $active = Activity::ACTIVE, $actualHours = 'false', $onlyTemplates = 'false')
    {
        $request = new WorkspaceProjectsRequest(
            array(
                'workspaceId'   => $this->validate($workspaceId),
                'active'        => $active,
                'actualHours'   => $actualHours,
                'onlyTemplates' => $onlyTemplates,
            )
        );

        $response = $this->delegate($request);

        $projects = array();
        foreach($response->body as $project) {
            $projects[] = $this->hydrator->hydrate($project, new Project());
        }

        return new WorkspaceProjectsResponse(
            array(
                'projects' => $projects,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceTasks($workspaceId, $active = Activity::ACTIVE)
    {
        $request = new WorkspaceTasksRequest(
            array(
                'workspaceId'   => $this->validate($workspaceId),
                'active'        => $active,
            )
        );

        $response = $this->delegate($request);

        $tasks = array();
        foreach($response->body as $task) {
            $tasks[] = $this->hydrator->hydrate($task, new Task());
        }

        return new WorkspaceTasksResponse(
            array(
                'tasks' => $tasks,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceTags($workspaceId)
    {
        $request = new WorkspaceTagsRequest(
            array(
                'workspaceId' => $this->validate($workspaceId),
            )
        );

        $response = $this->delegate($request);

        $tags = array();
        foreach($response->body as $tag) {
            $tags[] = $this->hydrator->hydrate($tag, new Tag());
        }

        return new WorkspaceTagsResponse(
            array(
                'tags' => $tags,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function updateWorkspace($workspaceId, Workspace $workspace)
    {
        $request = new UpdateWorkspace(
            array(
                'workspaceId' => $this->validate($workspaceId),
                'data' => $this->extractDataFromObject($workspace),
            )
        );

        $response = $this->delegate($request);

        $workspace = $this->hydrator->hydrate($response->body['data'], new Workspace());

        return new WorkspaceResponse(
            array(
                'workspace' => $workspace,
            )
        );
    }
}
