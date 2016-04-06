<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface TagServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface TagServiceInterface
{
    /**
     * Creates tag
     *
     * @param \Marek\Toggable\API\Toggl\Values\Tag\Tag $tag
     *
     * @return \Marek\Toggable\API\Http\Response\Tag\Tag
     */
    public function createTag(\Marek\Toggable\API\Toggl\Values\Tag\Tag $tag);

    /**
     * Updates tag
     *
     * @param int $tagId
     * @param \Marek\Toggable\API\Toggl\Values\Tag\Tag $tag
     *
     * @return \Marek\Toggable\API\Http\Response\Tag\Tag
     */
    public function updateTag($tagId, \Marek\Toggable\API\Toggl\Values\Tag\Tag $tag);

    /**
     * Deletes tag by id
     *
     * @param int $tagId
     *
     * @return \Marek\Toggable\API\Http\Response\Successful
     */
    public function deleteTag($tagId);
}
