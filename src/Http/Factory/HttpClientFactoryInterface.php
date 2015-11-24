<?php

namespace Marek\Toggl\Http\Factory;

use GuzzleHttp\ClientInterface;

/**
 * Interface HttpClientFactoryInterface
 * @package Marek\Toggl\Http\Factory
 */
interface HttpClientFactoryInterface
{
    /**
     * Creates bew instance of ClientInterface with given parameters
     *
     * @param string $baseUri
     *
     * @return ClientInterface
     */
    public static function createWithParameters($baseUri);
}
