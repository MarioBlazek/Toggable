<?php

namespace Marek\Toggable\API\Toggl\Values\Workspace;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class User
 * @package Marek\Toggable\API\Toggl\Values\Workspace
 *
 * @property-read int $id
 * @property-read int $uid
 * @property-read boolean $admin
 * @property-read boolean $active
 * @property-read string $inviteUrl
 */
class User extends ValueObject
{
    /**
     * Workspace user id
     *
     * @var int
     */
    public $id;

    /**
     * User id of the workspace user
     *
     * @var int
     */
    public $uid;

    /**
     * If user is workspace admin
     *
     * @var boolean
     */
    public $admin;

    /**
     * If the workspace user has accepted the invitation to this workspace
     *
     * @var boolean
     */
    public $active;

    /**
     * If user has not accepted the invitation the url for accepting his/her invitation is sent when the request is made by workspace_admin
     *
     * @var string
     */
    public $inviteUrl;
}
