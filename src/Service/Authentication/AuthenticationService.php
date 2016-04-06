<?php

namespace Marek\Toggable\Service\Authentication;

use Marek\Toggable\API\Http\Request\Authentication\SessionCookie;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Toggl\AuthenticationServiceInterface;
use Marek\Toggable\Http\RequestManagerInterface;
use Marek\Toggable\API\Http\Response\Authentication\SessionCookie as SessionCookieResponse;

/**
 * Class AuthenticationService
 * @package Marek\Toggable\Service\Authentication
 */
class AuthenticationService implements AuthenticationServiceInterface
{
    /**
     * @var \Marek\Toggable\Http\RequestManagerInterface
     */
    private $requestManager;

    /**
     * AuthenticationService constructor.
     *
     * @param \Marek\Toggable\Http\RequestManagerInterface $requestManager
     */
    public function __construct(RequestManagerInterface $requestManager)
    {
        $this->requestManager = $requestManager;
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
