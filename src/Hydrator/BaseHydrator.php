<?php

namespace Marek\Toggable\Hydrator;

use Marek\Toggable\Hydrator\Strategy\DateStrategy;
use Zend\Hydrator\HydratorInterface as ZendHydratorInterface;

/**
 * Class BaseHydrator
 * @package Marek\Toggable\Hydrator
 */
abstract class BaseHydrator implements HydratorInterface
{
    /**
     * @var ZendHydratorInterface
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
