<?php

namespace Marek\Toggable\Http\Client;

/**
 * Interface HttpClientInterface
 * @package Marek\Toggable\Http\Client
 */
interface HttpClientInterface
{
    /**
     * Send Http request and returns response
     *
     * @param \Marek\Toggable\API\Http\Request\RequestInterface
     *
     * @return \Marek\Toggable\API\Http\Client\HttpClientResponseInterface
     *
     * @throws \Marek\Toggable\API\Exception\Http\BaseException
     */
    public function send(\Marek\Toggable\API\Http\Request\RequestInterface $request);

    /**
     * Sets Authentication Token
     *
     * @param \Marek\Toggable\API\Security\TokenInterface $token
     */
    public function setToken(\Marek\Toggable\API\Security\TokenInterface $token);

    /**
     * Sets SessionCookie
     *
     * @param \Marek\Toggable\API\Security\Cookie\SessionCookieInterface $cookie
     */
    public function setCookie(\Marek\Toggable\API\Security\Cookie\SessionCookieInterface $cookie);
}
