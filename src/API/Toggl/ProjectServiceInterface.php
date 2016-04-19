<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface ProjectServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface ProjectServiceInterface
{
    /**
     * Returns project data by project id
     *
     * @param int $projectId
     *
     * @return \Marek\Toggable\API\Http\Response\Project\Project
     */
    public function getProjectData($projectId);

    /**
     * Creates new project
     *
     * @param \Marek\Toggable\API\Toggl\Values\Project\Project $project
     *
     * @return \Marek\Toggable\API\Http\Response\Project\Project
     */
    public function createProject(\Marek\Toggable\API\Toggl\Values\Project\Project $project);

    /**
     * Updates project
     *
     * @param \Marek\Toggable\API\Toggl\Values\Project\Project $project
     *
     * @return \Marek\Toggable\API\Http\Response\Project\Project
     */
    public function updateProject(\Marek\Toggable\API\Toggl\Values\Project\Project $project);

    /**
     * Deletes project by project id
     *
     * @param int $projectId
     *
     * @return \Marek\Toggable\API\Http\Response\Successful
     */
    public function deleteProject($projectId);

    /**
     * Returns project users
     *
     * @param int $projectId
     *
     * @return \Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUsers
     */
    public function getProjectUsers($projectId);

    /**
     * @param int $projectId
     *
     * @return mixed
     */
    public function getProjectTasks($projectId);

    /**
     * Deletes multiples projects
     *
     * @param array $projectIds
     *
     * @return \Marek\Toggable\API\Http\Response\Successful
     */
    public function deleteMultipleProjects(array $projectIds);
}
