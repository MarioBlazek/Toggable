<?php

namespace Marek\Toggable\Service\Authentication;

use Marek\Toggable\API\Http\Request\Authentication\SessionCookie;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Toggl\AuthenticationServiceInterface;
use Marek\Toggable\Http\Manager\RequestManagerInterface;
use Marek\Toggable\API\Http\Response\Authentication\SessionCookie as SessionCookieResponse;
use Marek\Toggable\Hydrator\HydratorInterface;
use Marek\Toggable\Service\AbstractService;

/**
 * Class AuthenticationService
 * @package Marek\Toggable\Service\Authentication
 */
class AuthenticationService extends AbstractService implements AuthenticationServiceInterface
{
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
