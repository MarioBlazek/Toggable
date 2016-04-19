<?php

namespace Marek\Toggable\Http\Manager;

/**
 * Class NativeRequestManager
 * @package Marek\Toggable\Http\Manager
 */
class NativeRequestManager implements RequestManagerInterface
{
    /**
     * @var \Marek\Toggable\Http\Client\HttpClientInterface
     */
    private $client;

    /**
     * NativeRequestManager constructor.
     *
     * @param \Marek\Toggable\Http\Client\HttpClientInterface $client
     */
    public function __construct(\Marek\Toggable\Http\Client\HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function request(\Marek\Toggable\API\Http\Request\Request $request)
    {
        $this->client->send($request);
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpClient()
    {
        return $this->client;
    }
}
