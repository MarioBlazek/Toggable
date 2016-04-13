<?php

namespace Marek\Toggable\Service\Authentication;

use Marek\Toggable\API\Http\Request\Authentication\SessionCookie;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Toggl\AuthenticationServiceInterface;
use Marek\Toggable\Http\Manager\RequestManagerInterface;
use Marek\Toggable\API\Http\Response\Authentication\SessionCookie as SessionCookieResponse;
use Marek\Toggable\Hydrator\HydratorInterface;

/**
 * Class AuthenticationService
 * @package Marek\Toggable\Service\Authentication
 */
class AuthenticationService implements AuthenticationServiceInterface
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
     * AuthenticationService constructor.
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

    public function getSessionCookie()
    {
        $request = new SessionCookie();

        $response = $this->requestManager->request($request);

        return $response;
    }

    public function destroySession()
    {
        // TODO: Implement destroySession() method.
    }
}
