<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Class WorkspaceUsersServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface WorkspaceUsersServiceInterface
{
    /**
     * Invite users to workspace
     *
     * @param int $workspaceId
     * @param array $emails
     *
     * @return \Marek\Toggable\API\Http\Response\WorkspaceUsers\Invitation
     */
    public function inviteUsers($workspaceId, array $emails);

    /**
     * Updates Workspace User
     *
     * @param int $workspaceUserId
     * @param \Marek\Toggable\API\Toggl\Values\Workspace\User $user
     *
     * @return \Marek\Toggable\API\Http\Response\WorkspaceUsers\WorkspaceUser
     */
    public function updateWorkspaceUser($workspaceUserId, \Marek\Toggable\API\Toggl\Values\Workspace\User $user);

    /**
     * Deletes Workspace User
     *
     * @param int $workspaceUserId
     *
     * @return \Marek\Toggable\API\Http\Response\ResponseInterface
     */
    public function deleteWorkspaceUser($workspaceUserId);

    /**
     * Returns list of Workspace Users
     *
     * @param int $workspaceId
     *
     * @return \Marek\Toggable\API\Http\Response\WorkspaceUsers\WorkspaceUsers
     */
    public function getWorkspaceUsers($workspaceId);
}
