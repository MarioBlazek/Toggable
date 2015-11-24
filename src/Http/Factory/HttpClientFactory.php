<?php

namespace Marek\Toggl\Http\Factory;

use GuzzleHttp\Client;

/**
 * Class HttpClientFactory
 * @package Marek\Toggl\Http\Factory
 */
class HttpClientFactory
{
    /**
     * {@inheritdoc}
     */
    public static function createWithParameters($baseUri)
    {
        return new Client([
            'base_uri' => $baseUri,
        ]);
    }
}
