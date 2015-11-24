<?php

namespace Marek\Toggl\Http;

use GuzzleHttp\ClientInterface;
use Marek\Toggl\Configuration\AuthConfigurationInterface;
use Marek\Toggl\Http\Factory\RequestFactoryInterface;
use Marek\Toggl\Http\Value\Transport;

class HttpClient implements HttpClientInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @var AuthConfigurationInterface
     */
    private $auth;

    public function __construct(
        AuthConfigurationInterface $auth,
        ClientInterface $client,
        RequestFactoryInterface $requestFactory
    )
    {
        $this->client = $client;
        $this->requestFactory = $requestFactory;
        $this->auth = $auth;
    }

    public function get(Transport $transport)
    {
        return $this->sendRequest(HttpClientInterface::GET, $transport);
    }

    public function post(Transport $transport)
    {
        return $this->sendRequest(HttpClientInterface::POST, $transport);
    }

    public function put(Transport $transport)
    {
        return $this->sendRequest(HttpClientInterface::PUT, $transport);
    }

    public function delete(Transport $transport)
    {
        return $this->sendRequest(HttpClientInterface::DELETE, $transport);
    }

    private function sendRequest($method, Transport $transport)
    {
        $request = $this->requestFactory
            ->createWithParameters($method, $transport->getUri(), $transport->getData());

        return $this->client->send($request, ['auth' => $this->auth->getAuthentication()]);
    }
}
