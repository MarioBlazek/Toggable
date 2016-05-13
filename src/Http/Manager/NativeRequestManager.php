<?php

namespace Marek\Toggable\Http\Manager;

use Marek\Toggable\API\Http\Response\Response;
use InvalidArgumentException;

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
     * @var \Marek\Toggable\API\Security\TokenInterface
     */
    private $token;

    /**
     * @var string
     */
    private $uri;

    /**
     * NativeRequestManager constructor.
     *
     * @param \Marek\Toggable\Http\Client\HttpClientInterface $client
     * @param \Marek\Toggable\API\Security\TokenInterface $token
     * @param string $uri
     */
    public function __construct(
        \Marek\Toggable\Http\Client\HttpClientInterface $client,
        \Marek\Toggable\API\Security\TokenInterface $token,
        $uri
    )
    {
        $this->client = $client;
        $this->token = $token;

        if (empty($uri) || !is_string($uri)) {
            throw new InvalidArgumentException(
                sprintf('Please provide valid ur in %s', get_class($this))
            );
        }
        $this->uri = $uri;
    }

    /**
     * {@inheritdoc}
     */
    public function request(\Marek\Toggable\API\Http\Request\Request $request)
    {
        $opts = array(
            'http' => array(
                'method' => $request->getMethod(),
                'header' => array(
                    'Content-type: application/json',
                ),
            ),
        );

        $auth = $this->token->getAuthentication();
        $auth = $auth[0] . ':' . $auth[1];
        $auth = base64_encode($auth);
        $opts['http']['header'][] = 'Authorization: Basic ' . $auth;

        if (!empty($request->getData())) {
            $opts['http']['content'] = json_encode($request);
        }

        $uri = $this->uri . '/' . $request->getUri();

        $data = $this->client->send($uri, $opts);

        var_dump(json_decode($data['data'], true));die;
        if (empty($data)) {
            throw new \Exception;
        }

        if ($data['data'] === false) {
            throw new \Exception;
        }
    }
}
