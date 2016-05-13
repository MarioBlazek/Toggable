<?php

namespace Marek\Toggable\Hydrator;

use Marek\Toggable\Hydrator\Strategy\BlogPostStrategy;
use Marek\Toggable\Hydrator\Strategy\DateStrategy;

/**
 * Class BaseHydrator
 * @package Marek\Toggable\Hydrator
 */
abstract class BaseHydrator implements HydratorInterface
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * DataHydrator constructor.
     */
    public function __construct()
    {
        $this->hydrator = new ObjectProperty();
        $this->hydrator->addStrategy('at', new DateStrategy());
        $this->hydrator->addStrategy('created_at', new DateStrategy());
        $this->hydrator->addStrategy('deleted_at', new DateStrategy());
        $this->hydrator->addStrategy('updated_at', new DateStrategy());
        $this->hydrator->addStrategy('server_deleted_at', new DateStrategy());
        $this->hydrator->addStrategy('start', new DateStrategy());
        $this->hydrator->addStrategy('stop', new DateStrategy());
        $this->hydrator->addStrategy('vat_validated_at', new DateStrategy());
        $this->hydrator->addStrategy('vat_invalid_accepted_at', new DateStrategy());
        $this->hydrator->addStrategy('new_blog_post', new BlogPostStrategy());
        $this->hydrator->addStrategy('last_blog_entry', new BlogPostStrategy());
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        return $this->hydrator->hydrate($data, $object);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        return $this->hydrator->extract($object);
    }
}
