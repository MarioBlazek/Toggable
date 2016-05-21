<?php

namespace Marek\Toggable\Service\Project;

use Marek\Toggable\API\Http\Request\Project\BulkDeleteProjects;
use Marek\Toggable\API\Http\Request\Project\CreateProject;
use Marek\Toggable\API\Http\Request\Project\DeleteProject;
use Marek\Toggable\API\Http\Request\Project\GetProject;
use Marek\Toggable\API\Http\Request\Project\GetProjectUsers;
use Marek\Toggable\API\Http\Request\Project\UpdateProject;
use Marek\Toggable\API\Http\Response\Project\Project as ProjectResponse;
use Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUser;
use Marek\Toggable\API\Toggl\Values\Project\Project;
use Marek\Toggable\Service\AbstractService;
use Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUsers as ProjectUsersResponse;

/**
 * Class ProjectService
 * @package Marek\Toggable\Service\Project
 */
class ProjectService extends AbstractService implements \Marek\Toggable\API\Toggl\ProjectServiceInterface
{
    /**
     * @inheritDoc
     */
    public function getProjectData($projectId)
    {
        $request = new GetProject(
            array(
                'projectId' => $this->validate($projectId),
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function createProject(\Marek\Toggable\API\Toggl\Values\Project\Project $project)
    {
        $request = new CreateProject(
            array(
                'data' => $this->extractDataFromObject($project),
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function updateProject(\Marek\Toggable\API\Toggl\Values\Project\Project $project)
    {
        $request = new UpdateProject(
            array(
                'data' => $this->extractDataFromObject($project),
            )
        );

        return $this->delegateHydrateAndReturnResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function deleteProject($projectId)
    {
        $request = new DeleteProject(
            array(
                'projectId' => $this->validate($projectId),
            )
        );

        return $this->delegate($request);
    }

    /**
     * @inheritDoc
     */
    public function getProjectUsers($projectId)
    {
        $request = new GetProjectUsers(
            array(
                'projectId' => $this->validate($projectId),
            )
        );

        $response = $this->delegate($request);

        $projectUsers = array();
        foreach ($response->body as $projectUser) {
            $projectUsers[] = $this->hydrator->hydrate($projectUser, new ProjectUser());
        }

        return new ProjectUsersResponse(
            array(
                'projectUsers' => $projectUsers,
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function getProjectTasks($projectId)
    {
        throw new \RuntimeException('Not implemented');
    }

    /**
     * @inheritDoc
     */
    public function deleteMultipleProjects(array $projectIds)
    {
        $request = new BulkDeleteProjects(
            array(
                'projectsIds' => $projectIds,
            )
        );

        return $this->delegate($request);
    }

    /**
     * @inheritDoc
     */
    protected function delegateHydrateAndReturnResponse(\Marek\Toggable\API\Http\Request\RequestInterface $request)
    {
        $response = $this->delegate($request);

        return new ProjectResponse(
            array(
                'project' => $this->hydrateDataFromArrayToObject($response, new Project()),
            )
        );
    }
}
