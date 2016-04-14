<?php

namespace Marek\Toggable\Service;

/**
 * Class AbstractService
 * @package Marek\Toggable\Service
 */
abstract class AbstractService
{
    /**
     * @var \Marek\Toggable\Http\Manager\RequestManagerInterface
     */
    protected $requestManager;

    /**
     * @var \Marek\Toggable\Hydrator\HydratorInterface
     */
    protected $hydrator;

    /**
     * AbstractService constructor.
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
}
