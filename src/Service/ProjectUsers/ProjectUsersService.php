<?php

namespace Marek\Toggable\Service\ProjectUsers;

/**
 * Class ProjectUsersService
 * @package Marek\Toggable\Service\ProjectUsers
 */
class ProjectUsersService implements \Marek\Toggable\API\Toggl\ProjectUsersServiceInterface
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
     * ProjectUsersService constructor.
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

