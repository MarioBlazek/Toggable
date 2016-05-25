<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface ProjectUsersServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface ProjectUsersServiceInterface
{
    /**
     * Creates ProjectUser
     *
     * @param \Marek\Toggable\API\Toggl\Values\Project\User $user
     *
     * @return \Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUser
     */
    public function createProjectUser(\Marek\Toggable\API\Toggl\Values\Project\User $user);

    /**
     * Updates ProjectUser by project user id
     *
     * @param int $projectUserId
     * @param \Marek\Toggable\API\Toggl\Values\Project\User $user
     *
     * @return \Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUser
     */
    public function updateProjectUser($projectUserId, \Marek\Toggable\API\Toggl\Values\Project\User $user);

    /**
     * Deletes ProjectUser by project user id
     *
     * @param int $projectUserId
     *
     * @return \Marek\Toggable\API\Http\Response\ResponseInterface
     */
    public function deleteProjectUser($projectUserId);

    /**
     * Creates multiple project users
     *
     * @param int $projectId
     * @param array $userIds
     * @param \Marek\Toggable\API\Toggl\Values\Project\User $user
     *
     * @return \Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUsers
     */
    public function createMultipleProjectUsers($projectId, $userIds, \Marek\Toggable\API\Toggl\Values\Project\User $user);

    /**
     * Updates multiple project users
     *
     * @param array $projectUserIds
     * @param \Marek\Toggable\API\Toggl\Values\Project\User $user
     *
     * @return \Marek\Toggable\API\Http\Response\ProjectUsers\ProjectUsers
     */
    public function updateMultipleProjectUsers($projectUserIds, \Marek\Toggable\API\Toggl\Values\Project\User $user);

    /**
     * Deletes multiple project users
     *
     * @param array $projectUserIds
     *
     * @return \Marek\Toggable\API\Http\Response\ResponseInterface
     */
    public function deleteMultipleProjectUsers($projectUserIds);
}
