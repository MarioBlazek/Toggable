<?php

namespace Marek\Toggable\Http;

use Marek\Toggable\API\Http\Request\Request;
use Marek\Toggable\API\Http\Response\Response;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

/**
 * Class RequestManager
 * @package Marek\Toggable\Http
 */
class RequestManager implements RequestManagerInterface
{
    /**
     * @var \Marek\Toggable\Http\HttpClientInterface
     */
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function request(Request $request)
    {
        $request = new GuzzleRequest($request->method, $request->uri);

        $response = $this->client->send($request);

        $responseBody = json_decode((string)$response->getBody(), true);

        return new Response($response->getStatusCode(), $responseBody);
    }
}
