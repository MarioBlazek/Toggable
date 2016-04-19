<?php

namespace Marek\Toggable\Service\Authentication;

use Marek\Toggable\API\Http\Request\Authentication\SessionCookie as SessionCookieRequest;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Http\Response\Successful;
use Marek\Toggable\API\Toggl\AuthenticationServiceInterface;
use Marek\Toggable\Service\AbstractService;
use Marek\Toggable\API\Security\Cookie\SessionCookie;

/**
 * Class AuthenticationService
 * @package Marek\Toggable\Service\Authentication
 */
class AuthenticationService extends AbstractService implements AuthenticationServiceInterface
{
    public function getSessionCookie()
    {
        $request = new SessionCookieRequest();

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        if (!empty($response->cookie)) {
            $sessionCookie = new SessionCookie($response->cookie);

            $client = $this->requestManager->getHttpClient();
            $client->setCookie($sessionCookie);

            return new Successful();
        }

        return $response;
    }

    public function destroySession()
    {
        // TODO: Implement destroySession() method.
    }
}
