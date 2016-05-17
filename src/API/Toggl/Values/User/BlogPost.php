<?php

namespace Marek\Toggable\API\Toggl\Values\User;

use Marek\Toggable\API\Toggl\Values\ValueObject;

/**
 * Class BlogPost
 * @package Marek\Toggable\API\Toggl\Values\User
 *
 * @property-read string $title
 * @property-read string $url
 */
class BlogPost extends ValueObject
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $url;
}
