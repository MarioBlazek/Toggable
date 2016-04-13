<?php

namespace Marek\Toggable\Http\Client;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;
use Marek\Toggable\API\Http\Response\Error;

/**
 * Class HttpClient
 * @package Marek\Toggable\Http\Client
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var \Marek\Toggable\API\Security\TokenInterface
     */
    private $token;

    /**
     * @var \GuzzleHttp\ClientInterface
     */
    private $client;

    /**
     * HttpClient constructor.
     *
     * @param \GuzzleHttp\ClientInterface $client
     * @param \Marek\Toggable\API\Security\TokenInterface $token
     */
    public function __construct(\GuzzleHttp\ClientInterface $client, \Marek\Toggable\API\Security\TokenInterface $token)
    {
        $this->token = $token;
        $this->client = $client;
    }

    /**
     * {@inheritDoc}
     */
    public function setToken(\Marek\Toggable\API\Security\TokenInterface $token)
    {
        $this->token = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function send(RequestInterface $request)
    {
        $response = null;

        try {
            $response = $this->client->send($request, array(
                'auth' => $this->token->getAuthentication(),
                )
            );
        } catch (GuzzleException $e) {
            
            return new Error(array(
                'statusCode' => $e->getCode(),
                'body' => $e->getMessage(),
                )
            );

        }

        return $response;
    }
}
