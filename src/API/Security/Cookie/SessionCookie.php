<?php

namespace Marek\Toggable\API\Security\Cookie;

use Marek\Toggable\API\Exception\InvalidArgumentException;

/**
 * Class SessionCookie
 * @package Marek\Toggable\API\Security\Cookie
 */
class SessionCookie implements SessionCookieInterface
{
    /**
     * @var string
     */
    private $cookie;

    /**
     * SessionCookie constructor.
     *
     * @param string $cookie
     */
    public function __construct($cookie)
    {
        if (empty($cookie) || !is_string($cookie)) {
            throw new InvalidArgumentException('cookie', get_class($this));
        }

        $this->cookie = $cookie;
    }

    /**
     * @inheritDoc
     */
    public function getSessionCookie()
    {
        return array(
            SessionCookieInterface::COOKIE_NAME => $this->cookie,
        );
    }

    /**
     * @inheritDoc
     */
    public function toString()
    {
        return strval($this->cookie);
    }
}
