<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface AuthenticationServiceInterface
 * @package Marek\Toggable\API\Toggl
 */
interface AuthenticationServiceInterface
{
    public function getSessionCookie();

    public function destroySession();
}
