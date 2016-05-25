<?php

namespace Marek\Toggable\Service\ProjectUsers;

use Marek\Toggable\API\Http\Request\Project\BulkDeleteProjects;
use Marek\Toggable\API\Http\Request\ProjectUsers\BulkUpdateProjectUsers;
use Marek\Toggable\API\Http\Request\ProjectUsers\CreateMultipleProjectUsers;
use Marek\Toggable\API\Http\Request\ProjectUsers\CreateProjectUser;
use Marek\Toggable\API\Http\Request\ProjectUsers\DeleteProjectUser;
use Marek\Toggable\API\Http\Request\ProjectUsers\UpdateProjectUser;
use Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUser;
use Marek\Toggable\API\Http\Response\ProjectUsers as ProjectUsersResponse;
use Marek\Toggable\API\Toggl\Values\Project\User;
use Marek\Toggable\Service\AbstractService;

/**
 * Class ProjectUsersService
 * @package Marek\Toggable\Service\ProjectUsers
 */
class ProjectUsersService extends AbstractService implements \Marek\Toggable\API\Toggl\ProjectUsersServiceInterface
{
    /**
     * @inheritDoc
     */
    public function createProjectUser(\Marek\Toggable\API\Toggl\Values\Project\User $user)
    {
        $request = new CreateProjectUser(
            array(
                'data' => $this->extractDataFromObject($user),
            )
        );

        $response = $this->delegate($request);

        return new ProjectUser(
            array(
                'projectUser' => $this->hydrateDataFromArrayToObject($response, new User()),
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function updateProjectUser($projectUserId, \Marek\Toggable\API\Toggl\Values\Project\User $user)
    {
        $request = new UpdateProjectUser(
            array(
                'projectUserId' => $this->validate($projectUserId),
                'data' => $this->extractDataFromObject($user),
            )
        );

        $response = $this->delegate($request);

        return new ProjectUser(
            array(
                'projectUser' => $this->hydrateDataFromArrayToObject($response, new User()),
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function deleteProjectUser($projectUserId)
    {
        $request = new DeleteProjectUser(
            array(
                'projectUserId' => $this->validate($projectUserId),
            )
        );

        return $this->delegate($request);
    }

    /**
     * @inheritDoc
     */
    public function createMultipleProjectUsers($projectId, $userIds, \Marek\Toggable\API\Toggl\Values\Project\User $user)
    {
        $request = new CreateMultipleProjectUsers(
            array(
                'projectId' => $this->validate($projectId),
                'userIds' => $userIds,
                'data' => $this->extractDataFromObject($user),
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
    public function updateMultipleProjectUsers($projectUserIds, \Marek\Toggable\API\Toggl\Values\Project\User $user)
    {
        $request = new BulkUpdateProjectUsers(
            array(
                'projectUserIds' => $projectUserIds,
                'data' => $this->extractDataFromObject($user),
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
    public function deleteMultipleProjectUsers($projectUserIds)
    {
        $request = new BulkDeleteProjects(
            array(
                'projectUserIds' => $projectUserIds,
            )
        );

        return $this->delegate($request);
    }

}

