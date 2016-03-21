<?php

namespace Marek\Toggable\API\Toggl\Value\User;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class User
 * @package Marek\Toggl\API\Value\User
 *
 * @property-read int $id
 * @property-read string $apiToken
 * @property-read int $defaultWid
 * @property-read string $email
 * @property-read string $jqueryTimeofdayFormat
 * @property-read string $jqueryDateFormat
 * @property-read string $timeofdayFormat
 * @property-read string $dateFormat
 * @property-read boolean $storeStartAndStopTime
 * @property-read int $beginningOfWeek
 * @property-read string $language
 * @property-read string $imageUrl
 * @property-read boolean $sidebarPiechart
 * @property-read \DateTime $lastChangedAt
 * @property-read int $retention
 * @property-read boolean $recordTimeline
 * @property-read boolean $renderTimeline
 * @property-read boolean $timelineEnabled
 * @property-read boolean $timelineExperiment
 * @property-read \Marek\Toggl\API\Value\User\BlogPost $newBlogPost
 * @property-read \Marek\Toggl\API\Value\TimeEntry\TimeEntry[] $timeEntries
 * @property-read \Marek\Toggl\API\Value\Project\Project[] $projects
 * @property-read \Marek\Toggl\API\Value\Tag\Tag[] $tags
 * @property-read \Marek\Toggl\API\Value\Workspace\Workspace[] $workspaces
 * @property-read \Marek\Toggl\API\Value\Client\Client[] $clients
 * @property-read boolean $sendProductEmails
 * @property-read boolean $sendWeeklyReport
 * @property-read boolean $sendTimerNotifications
 * @property-read boolean $openidEnabled
 * @property-read string $timezone
 */
class User extends ValueObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $apiToken;

    /**
     * Default workspace id
     *
     * @var int
     */
    public $defaultWid;

    /**
     * Email
     *
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $jqueryTimeofdayFormat;

    /**
     * @var string
     */
    public $jqueryDateFormat;

    /**
     * @var string
     */
    public $timeofdayFormat;

    /**
     * @var string
     */
    public $dateFormat;

    /**
     * Whether start and stop time are saved on time entry
     *
     * @var boolean
     */
    public $storeStartAndStopTime;

    /**
     * Integer 0-6, Sunday=0
     *
     * @var int
     */
    public $beginningOfWeek;

    /**
     * User's language
     *
     * @var string
     */
    public $language;

    /**
     * Url with the user's profile picture
     *
     * @var string
     */
    public $imageUrl;

    /**
     * Should a piechart be shown on the sidebar
     *
     * @var boolean
     */
    public $sidebarPiechart;

    /**
     * @var \DateTime
     */
    public $lastChangedAt;

    /**
     * @var int
     */
    public $retention;

    /**
     * @var boolean
     */
    public $recordTimeline;

    /**
     * @var boolean
     */
    public $renderTimeline;

    /**
     * @var boolean
     */
    public $timelineEnabled;

    /**
     * @var boolean
     */
    public $timelineExperiment;

    /**
     * An object with toggl blog post title and link
     *
     * @var \Marek\Toggl\API\Value\User\BlogPost
     */
    public $newBlogPost;

    /**
     * @var \Marek\Toggl\API\Value\TimeEntry\TimeEntry[]
     */
    public $timeEntries;

    /**
     * @var \Marek\Toggl\API\Value\Project\Project[]
     */
    public $projects;

    /**
     * @var \Marek\Toggl\API\Value\Tag\Tag[]
     */
    public $tags;

    /**
     * @var \Marek\Toggl\API\Value\Workspace\Workspace[]
     */
    public $workspaces;

    /**
     * @var \Marek\Toggl\API\Value\Client\Client[]
     */
    public $clients;

    /**
     * Toggl can send newsletters over e-mail to the user
     *
     * @var boolean
     */
    public $sendProductEmails;

    /**
     * If user receives weekly report
     *
     * @var boolean
     */
    public $sendWeeklyReport;

    /**
     * Email user about long-running (more than 8 hours) tasks
     *
     * @var boolean
     */
    public $sendTimerNotifications;

    /**
     * Google signin enabled
     *
     * @var boolean
     */
    public $openidEnabled;

    /**
     * Timezone user has set on the "My profile" page ( IANA TZ timezones )
     *
     * @var string
     */
    public $timezone;
}
