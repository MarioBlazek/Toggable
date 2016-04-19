<?php

namespace Marek\Toggable\API\Http\Response\Users;

/**
 * Class UserWithRelatedData
 * @package Marek\Toggable\API\Http\Response\Users
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\User\BlogPost $newBlogPost
 * @property-read \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry[] $timeEntries
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\Project[] $projects
 * @property-read \Marek\Toggable\API\Toggl\Values\Tag\Tag[] $tags
 * @property-read \Marek\Toggable\API\Toggl\Values\Workspace\Workspace[] $workspaces
 * @property-read \Marek\Toggable\API\Toggl\Values\Client\Client[] $clients
 */
class UserWithRelatedData extends User
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\User\BlogPost
     */
    public $newBlogPost;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\TimeEntry\TimeEntry[]
     */
    public $timeEntries;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\Project[]
     */
    public $projects;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Tag\Tag[]
     */
    public $tags;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Workspace\Workspace[]
     */
    public $workspaces;

    /**
     * @var \Marek\Toggable\API\Toggl\Values\Client\Client[]
     */
    public $clients;
}
