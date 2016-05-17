<?php

namespace Marek\Toggable\API\Toggl\Values\Project;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class User
 * @package Marek\Toggable\API\Toggl\Values\Project
 *
 * @property-read int $id
 * @property-read int $pid
 * @property-read int $uid
 * @property-read int $wid
 * @property-read boolean $manager
 * @property-read float $rate
 * @property-read \DateTime $at
 * @property-read string $fullname
 */
class User extends ValueObject
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Project ID
     *
     * @var int
     */
    protected $pid;

    /**
     * User ID, who is added to the project
     *
     * @var int
     */
    protected $uid;

    /**
     * Workspace ID, where the project belongs to
     *
     * @var int
     */
    protected $wid;

    /**
     * Admin rights for this project
     *
     * @var boolean
     */
    protected $manager = false;

    /**
     * Hourly rate for the project user (float, not-required, only for pro workspaces) in the currency of the project's client or in workspace default currency.
     *
     * @var float
     */
    protected $rate;

    /**
     * Indicates when the project user was last updated
     *
     * @var \DateTime
     */
    protected $at;

    /**
     * Full name of the user, who is added to the project
     *
     * @var string
     */
    protected $fullname;
}
