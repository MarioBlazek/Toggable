<?php

namespace Marek\Toggable\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;
use Marek\Toggable\API\Security\TokenInterface;

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

    public function __construct(ClientInterface $client, TokenInterface $token)
    {
        $this->token = $token;
        $this->client = $client;
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
            var_dump($e->getMessage());
        }

        return $response;
    }
}
