<?php

namespace Marek\Toggable\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Security\TokenInterface;

/**
 * Class HttpClient
 * @package Marek\Toggable\Http
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var \Marek\Toggable\API\Security\TokenInterface
     */
    private $token;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * HttpClient constructor.
     *
     * @param \GuzzleHttp\ClientInterface $client
     * @param \Marek\Toggable\API\Security\TokenInterface $token
     */
    public function __construct(ClientInterface $client, TokenInterface $token)
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
