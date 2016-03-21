<?php

namespace Marek\Toggl\API\Value\User;

use Marek\Toggl\API\Value\ValueObject;

/**
 * Class BlogPost
 * @package Marek\Toggl\API\Value\User
 *
 * @property-read string $title
 * @property-read string $url
 */
class BlogPost extends ValueObject
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $url;
}
