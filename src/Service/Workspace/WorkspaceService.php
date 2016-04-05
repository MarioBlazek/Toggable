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
use Marek\Toggable\API\Toggl\WorkspaceServiceInterface;
use Marek\Toggable\Http\RequestManagerInterface;
use Marek\Toggable\API\Toggl\Values\Activity;
use Zend\Hydrator\ObjectProperty;
use InvalidArgumentException;

/**
 * Class WorkspaceService
 * @package Marek\Toggable\Service\Client
 */
class WorkspaceService implements WorkspaceServiceInterface
{
    /**
     * @var \Marek\Toggable\Http\RequestManagerInterface
     */
    private $requestManager;

    /**
     * WorkspaceService constructor.
     *
     * @param \Marek\Toggable\Http\RequestManagerInterface $requestManager
     */
    public function __construct(RequestManagerInterface $requestManager)
    {
        $this->requestManager = $requestManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaces()
    {
        $request = new WorkspacesRequest();

        $response = $this->requestManager->request($request);
        
        $workspaces = array();
        foreach($response->body as $workspace) {
            $workspaces[] = (new ObjectProperty())->hydrate($workspace, new Workspace());
        }

        return new WorkspacesResponse(array('workspaces' => $workspaces));
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspace($workspaceId)
    {
        if (empty($workspaceId) || !is_int($workspaceId)) {
            throw new InvalidArgumentException(
                sprintf('$workspaceId argument not provided in %s', get_class($this))
            );
        }

        $request = new WorkspaceRequest(array(
            'workspaceId' => $workspaceId,
        ));

        $response = $this->requestManager->request($request);

        $workspace = (new ObjectProperty())->hydrate($response->body['data'], new Workspace());

        return new WorkspaceResponse(array(
            'workspace' => $workspace,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceUsers($workspaceId)
    {
        if (empty($workspaceId) || !is_int($workspaceId)) {
            throw new InvalidArgumentException(
                sprintf('$workspaceId argument not provided in %s', get_class($this))
            );
        }

        $request = new WorkspaceUsersRequest(array(
            'workspaceId' => $workspaceId,
        ));

        $response = $this->requestManager->request($request);

        $users = array();
        foreach($response->body as $user) {
            $users[] = (new ObjectProperty())->hydrate($user, new User());
        }

        return new WorkspaceUsersResponse(array(
            'users' => $users,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceClients($workspaceId)
    {
        if (empty($workspaceId) || !is_int($workspaceId)) {
            throw new InvalidArgumentException(
                sprintf('$workspaceId argument not provided in %s', get_class($this))
            );
        }

        $request = new WorkspaceClientsRequest(array(
            'workspaceId' => $workspaceId,
        ));

        $response = $this->requestManager->request($request);

        $clients = array();
        foreach($response->body as $client) {
            $clients[] = (new ObjectProperty())->hydrate($client, new Client());
        }

        return new WorkspaceClientsResponse(array(
            'clients' => $clients,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceProjects($workspaceId, $active = Activity::ACTIVE, $actualHours = 'false', $onlyTemplates = 'false')
    {
        if (empty($workspaceId) || !is_int($workspaceId)) {
            throw new InvalidArgumentException(
                sprintf('$workspaceId argument not provided in %s', get_class($this))
            );
        }

        $request = new WorkspaceProjectsRequest(array(
            'workspaceId'   => $workspaceId,
            'active'        => $active,
            'actualHours'   => $actualHours,
            'onlyTemplates' => $onlyTemplates,
        ));

        $response = $this->requestManager->request($request);

        $projects = array();
        foreach($response->body as $project) {
            $projects[] = (new ObjectProperty())->hydrate($project, new Project());
        }

        return new WorkspaceProjectsResponse(array(
            'projects' => $projects,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceTasks($workspaceId, $active = Activity::ACTIVE)
    {
        if (empty($workspaceId) || !is_int($workspaceId)) {
            throw new InvalidArgumentException(
                sprintf('$workspaceId argument not provided in %s', get_class($this))
            );
        }

        $request = new WorkspaceTasksRequest(array(
            'workspaceId'   => $workspaceId,
            'active'        => $active,
        ));

        $response = $this->requestManager->request($request);

        if (empty($response->body)) {
            return new WorkspaceTasksResponse(array(
                'tasks' => null,
            ));
        }

        $tasks = array();
        foreach($response->body as $task) {
            $tasks[] = (new ObjectProperty())->hydrate($task, new Task());
        }

        return new WorkspaceTasksResponse(array(
            'tasks' => $tasks,
            'statusCode' => $response->statusCode,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkspaceTags($workspaceId)
    {
        if (empty($workspaceId) || !is_int($workspaceId)) {
            throw new InvalidArgumentException(
                sprintf('$workspaceId argument not provided in %s', get_class($this))
            );
        }

        $request = new WorkspaceTagsRequest(array(
            'workspaceId' => $workspaceId,
        ));

        $response = $this->requestManager->request($request);

        if (empty($response->body)) {
            return new WorkspaceTagsResponse(array(
                'tags' => null,
            ));
        }

        $tags = array();
        foreach($response->body as $tag) {
            $tags[] = (new ObjectProperty())->hydrate($tag, new Tag());
        }

        return new WorkspaceTagsResponse(array(
            'tags' => $tags,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function updateWorkspace($workspaceId, Workspace $workspace)
    {
        if (empty($workspaceId) || !is_int($workspaceId)) {
            throw new InvalidArgumentException(
                sprintf('$workspaceId argument not provided in %s', get_class($this))
            );
        }

        $request = new UpdateWorkspace(array(
            'workspaceId' => $workspaceId,
            'workspace' => $workspace,
        ));

        $response = $this->requestManager->request($request);
        var_dump($response);
        die;
        $workspace = (new ObjectProperty())->hydrate($response->body['data'], new Workspace());

        return new WorkspaceResponse(array(
            'workspace' => $workspace,
        ));
    }
}
