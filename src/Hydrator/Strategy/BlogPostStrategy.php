<?php

namespace Marek\Toggable\Hydrator\Strategy;

use Marek\Toggable\API\Toggl\Values\User\BlogPost;
use Zend\Hydrator\Strategy\DefaultStrategy;

/**
 * Class BlogPostStrategy
 * @package Marek\Toggable\Hydrator\Strategy
 */
class BlogPostStrategy extends DefaultStrategy
{
    /**
     * {@inheritdoc}
     */
    public function hydrate($value)
    {
        if (is_array($value)) {
            $value = new BlogPost($value);
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($value)
    {
        if ($value instanceof BlogPost) {
            $value = array(
                'title' => $value->title,
                'url' => $value->url,
            );
        }

        return $value;
    }
}
