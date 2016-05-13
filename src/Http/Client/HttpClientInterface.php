<?php

namespace Marek\Toggable\Http\Client;

/**
 * Interface HttpClientInterface
 * @package Marek\Toggable\Http\Client
 */
interface HttpClientInterface
{
    /**
     * Sends http request and returns response data
     *
     * @param string $uri
     * @param array $options
     *
     * @return array
     */
    public function send($uri, $options);
}
