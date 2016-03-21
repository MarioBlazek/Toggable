<?php

namespace Marek\Toggl\API\Value\Project;

use Marek\Toggl\API\Value\ValueObject;

/**
 * Class Project
 * @package Marek\Toggl\API\Value\Project
 *
 * @property-read int $id
 * @property-read string $name
 * @property-read int $wid
 * @property-read int $cid
 * @property-read boolean $active
 * @property-read boolean $isPrivate
 * @property-read boolean $template
 * @property-read int $templateId
 * @property-read boolean $billable
 * @property-read boolean $autoEstimates
 * @property-read int $estimatedHours
 * @property-read \DateTime $lastUpdatedAt
 * @property-read int $color
 * @property-read float $rate
 * @property-read \DateTime $createdAt
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
    public $cid;

    /**
     * @var boolean
     */
    public $active = true;

    /**
     * @var boolean
     */
    public $isPrivate = true;

    /**
     * @var boolean
     */
    public $template;

    /**
     * @var int
     */
    public $templateId;

    /**
     * @var boolean
     */
    public $billable = true;

    /**
     * @var boolean
     */
    public $autoEstimates = false;

    /**
     * @var int
     */
    public $estimatedHours;

    /**
     * @var \DateTime
     */
    public $lastUpdatedAt;

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
    public $createdAt;
}
