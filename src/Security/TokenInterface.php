<?php

namespace Marek\Toggl\Security;

/**
 * Interface TokenInterface
 * @package Marek\Toggl\Security
 */
interface TokenInterface
{
    /**
     * Return authentication string
     * Example in case of API token it should return 1971800d4d82861d8f2c1651fea4d212:api_token
     *
     * @return string
     */
    public function getAuthenticationString();
}
