<?php

namespace Marek\Toggable\API\Toggl\Values\Project;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Project
 * @package Marek\Toggable\API\Toggl\Values\Project
 *
 * @property-read int $id
 * @property-read string $name
 * @property-read int $wid
 * @property-read int $guid
 * @property-read int $cid
 * @property-read boolean $active
 * @property-read boolean $is_private
 * @property-read boolean $template
 * @property-read int $template_id
 * @property-read boolean $billable
 * @property-read int $actual_hours
 * @property-read boolean $auto_estimates
 * @property-read int $estimated_hours
 * @property-read \DateTime $at
 * @property-read int $color
 * @property-read float $rate
 * @property-read \DateTime $created_at
 * @property-read \DateTime $server_deleted_at
 */
class Project extends ValueObject
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $wid;

    /**
     * @var int
     */
    protected $guid;

    /**
     * @var int
     */
    protected $cid;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var boolean
     */
    protected $is_private = true;

    /**
     * @var boolean
     */
    protected $template;

    /**
     * @var int
     */
    protected $template_id;

    /**
     * @var boolean
     */
    protected $billable;

    /**
     * @var int
     */
    protected $actual_hours;

    /**
     * @var boolean
     */
    protected $auto_estimates = false;

    /**
     * @var int
     */
    protected $estimated_hours;

    /**
     * @var \DateTime
     */
    protected $at;

    /**
     * @var int
     */
    protected $color;

    /**
     * @var float
     */
    protected $rate;

    /**
     * @var \DateTime
     */
    protected $created_at;

    /**
     * @var \DateTime
     */
    protected $server_deleted_at;
}
