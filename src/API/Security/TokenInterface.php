<?php

namespace Marek\Toggable\API\Security;

/**
 * Interface TokenInterface
 * @package Marek\Toggable\API\Security
 */
interface TokenInterface
{
    /**
     * Return authentication string
     * Example in case of API token it should return array('1971800d4d82861d8f2c1651fea4d212', 'api_token')
     *
     * @return array
     */
    public function getAuthentication();
}
