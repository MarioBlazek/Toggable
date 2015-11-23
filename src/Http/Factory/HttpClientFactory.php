<?php

namespace Marek\Toggl\Http\Factory;

use GuzzleHttp\Client;

class HttpClientFactory
{
    public static function createWithParameters($baseUri, array $headers)
    {
        return new Client([
            'base_uri' => $baseUri,
            'headers' => $headers
        ]);
    }
}
