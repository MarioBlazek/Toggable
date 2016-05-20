<?php

namespace Marek\Toggable\Service\Project;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Request\Project\CreateProject;
use Marek\Toggable\API\Http\Request\Project\DeleteProject;
use Marek\Toggable\API\Http\Request\Project\GetProject;
use Marek\Toggable\API\Http\Request\Project\UpdateProject;
use Marek\Toggable\API\Http\Response\Project\Project as ProjectResponse;
use Marek\Toggable\API\Toggl\Values\Project\Project;
use Marek\Toggable\Service\AbstractService;

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
        if (empty($projectId) || !is_int($projectId)) {
            throw new InvalidArgumentException(
                sprintf('$projectId argument not provided in %s', get_class($this))
            );
        }

        $request = new GetProject(
            array(
                'projectId' => $projectId,
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
        if (empty($projectId) || !is_int($projectId)) {
            throw new InvalidArgumentException(
                sprintf('$projectId argument not provided in %s', get_class($this))
            );
        }

        $request = new DeleteProject(
            array(
                'projectId' => $projectId,
            )
        );

        return $this->delegate($request);
    }

    /**
     * @inheritDoc
     */
    public function getProjectUsers($projectId) {
        // TODO: Implement getProjectUsers() method.
    }

    /**
     * @inheritDoc
     */
    public function getProjectTasks($projectId) {
        // TODO: Implement getProjectTasks() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteMultipleProjects(array $projectIds) {
        // TODO: Implement deleteMultipleProjects() method.
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
