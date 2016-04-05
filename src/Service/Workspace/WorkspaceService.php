<?php

namespace Marek\Toggable\Service\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\Workspaces as WorkspacesRequest;
use Marek\Toggable\API\Http\Request\Workspace\Workspace as WorkspaceRequest;
use Marek\Toggable\API\Http\Response\Workspace\Workspaces as WorkspacesResponse;
use Marek\Toggable\API\Http\Response\Workspace\Workspace as WorkspaceResponse;
use Marek\Toggable\API\Toggl\Values\Workspace\Workspace;
use Marek\Toggable\API\Toggl\WorkspaceServiceInterface;
use Marek\Toggable\Http\RequestManagerInterface;
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
}
