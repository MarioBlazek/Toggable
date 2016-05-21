<?php

namespace Marek\Toggable\API\Http\Response\Workspace;

/**
 * Class WorkspaceTags
 * @package Marek\Toggable\API\Http\Response\Workspace
 *
 * @property-read \Marek\Toggable\API\Toggl\Values\Tag\Tag[] $tags
 */
class WorkspaceTags extends \Marek\Toggable\API\Http\Response\Response
{
    /**
     * @var \Marek\Toggable\API\Toggl\Values\Tag\Tag[]
     */
    public $tags;
}
