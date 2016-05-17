<?php

namespace Marek\Toggable\Http\Manager;

use Marek\Toggable\API\Exception\Http\BaseException;
use Marek\Toggable\API\Exception\NotFoundException;

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
    public function request(\Marek\Toggable\API\Http\Request\RequestInterface $request)
    {
        try {

            $this->client->prepare($request);
            $response = $this->client->getResponse();

        } catch (BaseException $e) {

            throw new NotFoundException(get_class($request));

        }

        return $response;
    }
}
