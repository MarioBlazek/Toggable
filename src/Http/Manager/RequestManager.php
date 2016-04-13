<?php

namespace Marek\Toggable\Http\Manager;

use Marek\Toggable\API\Http\Request\Request;
use Marek\Toggable\API\Http\Response\Error;
use Marek\Toggable\API\Http\Response\Response;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

/**
 * Class RequestManager
 * @package Marek\Toggable\Http\Manager
 */
class RequestManager implements RequestManagerInterface
{
    /**
     * @var \Marek\Toggable\Http\Client\HttpClientInterface
     */
    private $client;

    /**
     * RequestManager constructor.
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
    public function request(Request $request)
    {
        if ($request->hasData) {

            $request = new GuzzleRequest($request->method, $request->uri, $request->headers, json_encode($request->toArray()));

        } else {

            $request = new GuzzleRequest($request->method, $request->uri, $request->headers);

        }

        $response = $this->client->send($request);

        if ($response instanceof Error) {
            return $response;
        }

        $responseBody = json_decode((string)$response->getBody(), true);

        $cookie = '';
        if ($response->hasHeader('Set-Cookie')) {
            $cookie = $response->getHeader('Set-Cookie')[0];
        }

        return new Response(array(
            'statusCode' => $response->getStatusCode(),
            'body' => $responseBody,
            'cookie' => $cookie,
        ));
    }
}
