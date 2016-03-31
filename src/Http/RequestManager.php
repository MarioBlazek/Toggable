<?php

namespace Marek\Toggable\Http;

use GuzzleHttp\Exception\BadResponseException;
use Marek\Toggable\API\Http\Request\Request;
use Marek\Toggable\API\Http\Response\Error\Error;
use Marek\Toggable\API\Http\Response\Response;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Exception\GuzzleException;

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

        return new Response(array(
            'statusCode' => $response->getStatusCode(),
            'body' => $responseBody,
            )
        );
    }
}
