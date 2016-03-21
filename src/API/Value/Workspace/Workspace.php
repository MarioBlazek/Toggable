<?php

namespace Marek\Toggl\API\Value\Workspace;

use Marek\Toggl\API\Value\ValueObject;

/**
 * Class Workspace
 * @package Marek\Toggl\API\Value\Workspace
 *
 * @property-read int $id
 * @property-read string $name
 * @property-read boolean $premium
 * @property-read boolean $admin
 * @property-read float $defaultHourlyRate
 * @property-read string $defaultCurrency
 * @property-read boolean $onlyAdminsMayCreateProjects
 * @property-read boolean $onlyAdminsSeeBillableRates
 * @property-read int $rounding
 * @property-read int $roundingMinutes
 * @property-read \DateTime $lastUpdatedAt
 * @property-read string $logoUrl
 */
class Workspace extends ValueObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * The name of the workspace
     *
     * @var string
     */
    public $name;

    /**
     * If it's a pro workspace or not. Shows if someone is paying for the workspace or not
     *
     * @var boolean
     */
    public $premium;

    /**
     * Shows whether currently requesting user has admin access to the workspace
     *
     * @var boolean
     */
    public $admin;

    /**
     * Default hourly rate for workspace, won't be shown to non-admins if the only_admins_see_billable_rates flag is set to true
     *
     * @var float
     */
    public $defaultHourlyRate;

    /**
     * Default currency for workspace
     *
     * @var string
     */
    public $defaultCurrency;

    /**
     * Whether only the admins can create projects or everybody
     *
     * @var boolean
     */
    public $onlyAdminsMayCreateProjects;

    /**
     * Whether only the admins can see billable rates or everybody
     *
     * @var boolean
     */
    public $onlyAdminsSeeBillableRates;

    /**
     * Type of rounding
     *
     * @var int
     */
    public $rounding;

    /**
     * Round up to nearest minute
     *
     * @var int
     */
    public $roundingMinutes;

    /**
     * Timestamp that indicates the time workspace was last updated
     *
     * @var \DateTime
     */
    public $lastUpdatedAt;

    /**
     * URL pointing to the logo
     *
     * @var string
     */
    public $logoUrl;
}

