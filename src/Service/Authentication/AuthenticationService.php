<?php

namespace Marek\Toggable\Service\Authentication;

use Marek\Toggable\API\Toggl\AuthenticationServiceInterface;
use Marek\Toggable\Service\AbstractService;

/**
 * Class AuthenticationService
 * @package Marek\Toggable\Service\Authentication
 */
class AuthenticationService extends AbstractService implements AuthenticationServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getSessionCookie()
    {
        throw new \RuntimeException('Not implemented');
    }

    /**
     * @inheritdoc
     */
    public function destroySession()
    {
        throw new \RuntimeException('Not implemented');
    }
}
