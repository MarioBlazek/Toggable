<?php

namespace Marek\Toggable\Service\Workspace;

use Marek\Toggable\API\Http\Request\Workspace\Workspaces as WorkspacesRequest;
use Marek\Toggable\API\Http\Response\Workspace\Workspaces as WorkspacesResponse;
use Marek\Toggable\API\Toggl\Values\Workspace\Workspace;
use Marek\Toggable\API\Toggl\WorkspaceServiceInterface;
use Marek\Toggable\Http\RequestManagerInterface;
use Zend\Hydrator\ObjectProperty;

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
        var_dump($response->body[0]['subscription']);
        $workspaces = array();
        foreach($response->body as $workspace) {
            $workspaces[] = (new ObjectProperty())->hydrate($workspace, new Workspace());
        }

        return new WorkspacesResponse(array('workspaces' => $workspaces));
    }
}
