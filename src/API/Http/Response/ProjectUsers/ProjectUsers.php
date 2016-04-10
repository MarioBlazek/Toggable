<?php

namespace Marek\Toggable\API\Http\Response\ProjectUsers;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class ProjectUsers
 * @package Marek\Toggable\API\Http\Response\ProjectUsers
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Project\User[] $projectUsers
 */
class ProjectUsers extends Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Project\User[]
     */
    public $projectUsers;
}
