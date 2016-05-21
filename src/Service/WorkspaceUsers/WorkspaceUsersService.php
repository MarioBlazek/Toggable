<?php

namespace Marek\Toggable\Service\WorkspaceUsers;

use Marek\Toggable\API\Http\Request\WorkspaceUsers\DeleteWorkspaceUser;
use Marek\Toggable\API\Http\Request\WorkspaceUsers\GetWorkspaceUsers;
use Marek\Toggable\API\Http\Request\WorkspaceUsers\InviteUserToWorkspace;
use Marek\Toggable\API\Http\Request\WorkspaceUsers\UpdateWorkspaceUser;
use Marek\Toggable\API\Http\Response\WorkspaceUsers\Invitation;
use Marek\Toggable\API\Http\Response\WorkspaceUsers\WorkspaceUser;
use Marek\Toggable\API\Http\Response\WorkspaceUsers\WorkspaceUsers;
use Marek\Toggable\API\Toggl\Values\Notification;
use Marek\Toggable\API\Toggl\Values\Workspace\User;
use Marek\Toggable\Service\AbstractService;

/**
 * Class WorkspaceUsersService
 * @package Marek\Toggable\Service\WorkspaceUsers
 */
class WorkspaceUsersService extends AbstractService implements \Marek\Toggable\API\Toggl\WorkspaceUsersServiceInterface
{
    /**
     * @inheritDoc
     */
    public function inviteUsers($workspaceId, array $emails)
    {
        $request = new InviteUserToWorkspace(
            array(
                'workspaceId' => $this->validate($workspaceId),
                'data' => $emails,
            )
        );

        $response = $this->delegate($request);

        $workspaceUsers = array();
        foreach($response->body['data'] as $workspaceUser) {
            $workspaceUsers[] = $this->hydrator->hydrate($workspaceUser, new User());
        }

        $notifications = array();
        foreach($response->body['notifications'] as $notification) {
            $notifications[] = new Notification(
                array(
                    'message' => $notification,
                )
            );
        }

        return new Invitation(
            array(
                'workspaceUsers' => $workspaceUsers,
                'notifications' => $notifications,
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function updateWorkspaceUser($workspaceUserId, \Marek\Toggable\API\Toggl\Values\Workspace\User $user)
    {
        $request = new UpdateWorkspaceUser(
            array(
                'workspaceUserId' => $this->validate($workspaceUserId),
                'data' => $this->extractDataFromObject($user),
            )
        );

        $response = $this->delegate($request);

        return new WorkspaceUser(
            array(
                'workspaceUser' => $this->hydrateDataFromArrayToObject($response, new User())
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function deleteWorkspaceUser($workspaceUserId)
    {
        $request = new DeleteWorkspaceUser(
            array(
                'workspaceUserId' => $this->validate($workspaceUserId),
            )
        );

        return $this->delegate($request);
    }

    /**
     * @inheritDoc
     */
    public function getWorkspaceUsers($workspaceId)
    {
        $request = new GetWorkspaceUsers(
            array(
                'workspaceId' => $this->validate($workspaceId),
            )
        );

        $response = $this->delegate($request);

        $workspaceUsers = array();
        foreach($response->body as $workspaceUser) {
            $workspaceUsers[] = $this->hydrator->hydrate($workspaceUser, new User());
        }

        return new WorkspaceUsers(
            array(
                'workspaceUsers' => $workspaceUsers,
            )
        );
    }
}
