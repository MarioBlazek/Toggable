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
 */
class Project extends ValueObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $wid;

    /**
     * @var int
     */
    public $guid;

    /**
     * @var int
     */
    public $cid;

    /**
     * @var boolean
     */
    public $active = true;

    /**
     * @var boolean
     */
    public $is_private = true;

    /**
     * @var boolean
     */
    public $template;

    /**
     * @var int
     */
    public $template_id;

    /**
     * @var boolean
     */
    public $billable = true;

    /**
     * @var int
     */
    public $actual_hours;

    /**
     * @var boolean
     */
    public $auto_estimates = false;

    /**
     * @var int
     */
    public $estimated_hours;

    /**
     * @var \DateTime
     */
    public $at;

    /**
     * @var int
     */
    public $color;

    /**
     * @var float
     */
    public $rate;

    /**
     * @var \DateTime
     */
    public $created_at;
}
