<?php

namespace Marek\Toggable\Service\Project;

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
    public function getProjectData($projectId) {
        // TODO: Implement getProjectData() method.
    }

    /**
     * @inheritDoc
     */
    public function createProject(\Marek\Toggable\API\Toggl\Values\Project\Project $project) {
        // TODO: Implement createProject() method.
    }

    /**
     * @inheritDoc
     */
    public function updateProject(\Marek\Toggable\API\Toggl\Values\Project\Project $project) {
        // TODO: Implement updateProject() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteProject($projectId) {
        // TODO: Implement deleteProject() method.
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


}
