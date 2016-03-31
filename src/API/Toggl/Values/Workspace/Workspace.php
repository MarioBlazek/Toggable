<?php

namespace Marek\Toggable\API\Toggl\Values\Workspace;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class Workspace
 * @package Marek\Toggable\API\Toggl\Values\Workspace
 *
 * @property-read int $id
 * @property-read string $name
 * @property-read int $profile
 * @property-read boolean $premium
 * @property-read boolean $admin
 * @property-read float $default_hourly_rate
 * @property-read string $default_currency
 * @property-read boolean $only_admins_may_create_projects
 * @property-read boolean $only_admins_see_billable_rates
 * @property-read boolean $only_admins_see_team_dashboard
 * @property-read boolean $projects_billable_by_default
 * @property-read int $rounding
 * @property-read int $roundingMinutes
 * @property-read \DateTime $at
 * @property-read string $logoUrl
 * @property-read string $api_token
 * @property-read boolean $ical_enabled
 * @property-read boolean $subscription
 * @property-read boolean $campaign
 * @property-read boolean $business_tester
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
     * Profile
     *
     * @var int
     */
    public $profile;

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
    public $default_hourly_rate;

    /**
     * Default currency for workspace
     *
     * @var string
     */
    public $default_currency;

    /**
     * Whether only the admins can create projects or everybody
     *
     * @var boolean
     */
    public $only_admins_may_create_projects;

    /**
     * Whether only the admins can see billable rates or everybody
     *
     * @var boolean
     */
    public $only_admins_see_billable_rates;

    /**
     * Only admins see team dashboard
     *
     * @var boolean
     */
    public $only_admins_see_team_dashboard;

    /**
     * Projects billable by default
     *
     * @var boolean
     */
    public $projects_billable_by_default;

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
    public $rounding_minutes;

    /**
     * Timestamp that indicates the time workspace was last updated
     *
     * @var \DateTime
     */
    public $at;

    /**
     * URL pointing to the logo
     *
     * @var string
     */
    public $logoUrl;

    /**
     * API token
     *
     * @var string
     */
    public $api_token;

    /**
     * @var boolean
     */
    public $ical_enabled;

    /**
     * @var string
     */
    public $subscription;

    /**
     * @var boolean
     */
    public $campaign;

    /**
     * @var boolean
     */
    public $business_tester;
}

