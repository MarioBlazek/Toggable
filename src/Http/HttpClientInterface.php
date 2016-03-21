<?php

namespace Marek\Toggable\Http;

/**
 * Interface HttpClientInterface
 * @package Marek\Toggable\Http
 */
interface HttpClientInterface
{
    /**
     * Send Http request and returns response
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(\Psr\Http\Message\RequestInterface $request);
}
