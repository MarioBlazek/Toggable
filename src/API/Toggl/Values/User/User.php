<?php

namespace Marek\Toggable\API\Toggl\Values\User;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class User
 * @package Marek\Toggable\API\Toggl\Values\User
 *
 * @property-read int $id
 * @property-read string $api_token
 * @property-read int $default_wid
 * @property-read string $fullname
 * @property-read string $email
 * @property-read string $jquery_timeofday_format
 * @property-read string $jquery_date_format
 * @property-read string $timeofday_format
 * @property-read string $date_format
 * @property-read boolean $store_start_and_stop_time
 * @property-read int $beginning_of_week
 * @property-read string $language
 * @property-read string $image_url
 * @property-read boolean $sidebar_piechart
 * @property-read \DateTime $at
 * @property-read \DateTime $created_at
 * @property-read int $retention
 * @property-read boolean $record_timeline
 * @property-read boolean $render_timeline
 * @property-read boolean $timeline_enabled
 * @property-read boolean $timeline_experiment
 * @property-read boolean $manual_mode
 * @property-read boolean $should_upgrade
 * @property-read boolean $achievements_enabled
 * @property-read boolean $openid_enabled
 * @property-read \Marek\Toggable\API\Toggl\Values\User\BlogPost $new_blog_post
 * @property-read \Marek\Toggable\API\Toggl\Values\User\BlogPost $last_blog_entry
 * @property-read boolean $send_product_emails
 * @property-read boolean $send_weekly_report
 * @property-read boolean $send_timer_notifications
 * @property-read boolean $invitation
 * @property-read string $timezone
 * @property-read string $duration_format
 * @property-read string $obm
 * @property-read boolean $used_next
 */
class User extends ValueObject
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $api_token;

    /**
     * Default workspace id
     *
     * @var int
     */
    protected $default_wid;

    /**
     * @var string
     */
    protected $fullname;

    /**
     * Email
     *
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $jquery_timeofday_format;

    /**
     * @var string
     */
    protected $jquery_date_format;

    /**
     * @var string
     */
    protected $timeofday_format;

    /**
     * @var string
     */
    protected $date_format;

    /**
     * Whether start and stop time are saved on time entry
     *
     * @var boolean
     */
    protected $store_start_and_stop_time;

    /**
     * Integer 0-6, Sunday=0
     *
     * @var int
     */
    protected $beginning_of_week;

    /**
     * User's language
     *
     * @var string
     */
    protected $language;

    /**
     * Url with the user's profile picture
     *
     * @var string
     */
    protected $image_url;

    /**
     * Should a piechart be shown on the sidebar
     *
     * @var boolean
     */
    protected $sidebar_piechart;

    /**
     * @var \DateTime
     */
    protected $at;

    /**
     * @var \DateTime
     */
    protected $created_at;

    /**
     * @var int
     */
    protected $retention;

    /**
     * @var boolean
     */
    protected $record_timeline;

    /**
     * @var boolean
     */
    protected $render_timeline;

    /**
     * @var boolean
     */
    protected $timeline_enabled;

    /**
     * @var boolean
     */
    protected $timeline_experiment;

    /**
     * @var boolean
     */
    protected $manual_mode;

    /**
     * @var boolean
     */
    protected $should_upgrade;

    /**
     * @var boolean
     */
    protected $achievements_enabled;

    /**
     * @var boolean
     */
    protected $invitation;

    /**
     * An object with toggl blog post title and link
     *
     * @var \Marek\Toggable\API\Toggl\Values\User\BlogPost
     */
    protected $new_blog_post;

    /**
     * Toggl can send newsletters over e-mail to the user
     *
     * @var boolean
     */
    protected $send_product_emails;

    /**
     * If user receives weekly report
     *
     * @var boolean
     */
    protected $send_weekly_report;

    /**
     * Email user about long-running (more than 8 hours) tasks
     *
     * @var boolean
     */
    protected $send_timer_notifications;

    /**
     * Google signin enabled
     *
     * @var boolean
     */
    protected $openid_enabled;

    /**
     * Timezone user has set on the "My profile" page ( IANA TZ timezones )
     *
     * @var string
     */
    protected $timezone;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\User\BlogPost
     */
    protected $last_blog_entry;

    /**
     * @var string
     */
    protected $duration_format;

    /**
     * @var string
     */
    protected $obm;

    /**
     * @var boolean
     */
    protected $used_next;
}
