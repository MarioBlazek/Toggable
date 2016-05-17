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
 * @property-read string $invite_url
 */
class User extends ValueObject
{
    /**
     * Workspace user id
     *
     * @var int
     */
    protected $id;

    /**
     * User id of the workspace user
     *
     * @var int
     */
    protected $uid;

    /**
     * If user is workspace admin
     *
     * @var boolean
     */
    protected $admin;

    /**
     * If the workspace user has accepted the invitation to this workspace
     *
     * @var boolean
     */
    protected $active;

    /**
     * If user has not accepted the invitation the url for accepting his/her invitation is sent when the request is made by workspace_admin
     *
     * @var string
     */
    protected $invite_url;
}
