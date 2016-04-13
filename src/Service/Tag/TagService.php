<?php

namespace Marek\Toggable\Service\Tag;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Request\Tag\CreateTag;
use Marek\Toggable\API\Http\Request\Tag\DeleteTag;
use Marek\Toggable\API\Http\Request\Tag\UpdateTag;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Toggl\Values\Tag\Tag;
use Marek\Toggable\API\Http\Response\Tag\Tag as TagResponse;
use Marek\Toggable\Hydrator\HydratorInterface;

/**
 * Class TagService
 * @package Marek\Toggable\Service\Tag
 */
class TagService implements \Marek\Toggable\API\Toggl\TagServiceInterface
{
    /**
     * @var \Marek\Toggable\Http\Manager\RequestManagerInterface
     */
    private $requestManager;

    /**
     * @var \Marek\Toggable\Hydrator\HydratorInterface
     */
    private $hydrator;

    /**
     * TagService constructor.
     *
     * @param \Marek\Toggable\Http\Manager\RequestManagerInterface $requestManager
     * @param \Marek\Toggable\Hydrator\HydratorInterface $hydrator
     */
    public function __construct(
        \Marek\Toggable\Http\Manager\RequestManagerInterface $requestManager,
        \Marek\Toggable\Hydrator\HydratorInterface $hydrator
    )
    {
        $this->requestManager = $requestManager;
        $this->hydrator = $hydrator;
    }

    /**
     * @inheritDoc
     */
    public function createTag(\Marek\Toggable\API\Toggl\Values\Tag\Tag $tag)
    {
        $request = new CreateTag(array(
            'tag' => $tag,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $tag = $this->hydrator->hydrate($response->body['data'], new Tag());

        return new TagResponse(array(
            'tag' => $tag,
        ));
    }

    /**
     * @inheritDoc
     */
    public function updateTag($tagId, \Marek\Toggable\API\Toggl\Values\Tag\Tag $tag)
    {
        if (empty($tagId) || !is_int($tagId)) {
            throw new InvalidArgumentException(
                sprintf('$tagId argument not provided in %s', get_class($this))
            );
        }

        $request = new UpdateTag(array(
            'tagId' => $tagId,
            'tag' => $tag,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $tag = $this->hydrator->hydrate($response->body['data'], new Tag());

        return new TagResponse(array(
            'tag' => $tag,
        ));
    }

    /**
     * @inheritDoc
     */
    public function deleteTag($tagId)
    {
        if (empty($tagId) || !is_int($tagId)) {
            throw new InvalidArgumentException(
                sprintf('$tagId argument not provided in %s', get_class($this))
            );
        }

        $request = new DeleteTag(array(
            'tagId' => $tagId,
        ));

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $tag = $this->hydrator->hydrate($response->body['data'], new Tag());

        return new TagResponse(array(
            'tag' => $tag,
        ));
    }
}
