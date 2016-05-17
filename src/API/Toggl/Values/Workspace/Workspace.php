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
 * @property-read int $rounding_minutes
 * @property-read \DateTime $at
 * @property-read string $logo_url
 * @property-read string $api_token
 * @property-read boolean $ical_enabled
 * @property-read string $ical_url
 * @property-read boolean $subscription
 * @property-read boolean $campaign
 * @property-read boolean $business_tester
 */
class Workspace extends ValueObject
{
    /**
     * @var int
     */
    protected $id;

    /**
     * The name of the workspace
     *
     * @var string
     */
    protected $name;

    /**
     * Profile
     *
     * @var int
     */
    protected $profile;

    /**
     * If it's a pro workspace or not. Shows if someone is paying for the workspace or not
     *
     * @var boolean
     */
    protected $premium;

    /**
     * Shows whether currently requesting user has admin access to the workspace
     *
     * @var boolean
     */
    protected $admin;

    /**
     * Default hourly rate for workspace, won't be shown to non-admins if the only_admins_see_billable_rates flag is set to true
     *
     * @var float
     */
    protected $default_hourly_rate;

    /**
     * Default currency for workspace
     *
     * @var string
     */
    protected $default_currency;

    /**
     * Whether only the admins can create projects or everybody
     *
     * @var boolean
     */
    protected $only_admins_may_create_projects;

    /**
     * Whether only the admins can see billable rates or everybody
     *
     * @var boolean
     */
    protected $only_admins_see_billable_rates;

    /**
     * Only admins see team dashboard
     *
     * @var boolean
     */
    protected $only_admins_see_team_dashboard;

    /**
     * Projects billable by default
     *
     * @var boolean
     */
    protected $projects_billable_by_default;

    /**
     * Type of rounding
     *
     * @var int
     */
    protected $rounding;

    /**
     * Round up to nearest minute
     *
     * @var int
     */
    protected $rounding_minutes;

    /**
     * Timestamp that indicates the time workspace was last updated
     *
     * @var \DateTime
     */
    protected $at;

    /**
     * URL pointing to the logo
     *
     * @var string
     */
    protected $logo_url;

    /**
     * API token
     *
     * @var string
     */
    protected $api_token;

    /**
     * @var boolean
     */
    protected $ical_enabled;

    /**
     * @var string
     */
    protected $ical_url;

    /**
     * @var string
     */
    protected $subscription;

    /**
     * @var boolean
     */
    protected $campaign;

    /**
     * @var boolean
     */
    protected $business_tester;
}

