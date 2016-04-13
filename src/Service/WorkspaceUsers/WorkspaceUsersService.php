<?php

namespace Marek\Toggable\Service\WorkspaceUsers;

/**
 * Class WorkspaceUsersService
 * @package Marek\Toggable\Service\WorkspaceUsers
 */
class WorkspaceUsersService implements \Marek\Toggable\API\Toggl\WorkspaceServiceInterface
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
     * WorkspaceUsersService constructor.
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
