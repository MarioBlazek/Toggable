<?php

namespace Marek\Toggable\Http\Client;
use Marek\Toggable\API\Exception\Http\NetworkException;
use Marek\Toggable\API\Exception\Http\ServerException;
use Marek\Toggable\API\Security\Cookie\SessionCookieInterface;

/**
 * Class NativeHttpClient
 * @package Marek\Toggable\Http\Client
 */
class NativeHttpClient implements HttpClientInterface
{
    /**
     * @var \Marek\Toggable\API\Security\TokenInterface
     */
    private $token;

    /**
     * @var string
     */
    private $url;

    /**
     * NativeHttpClient constructor.
     *
     * @param string $url
     * @param \Marek\Toggable\API\Security\TokenInterface $token
     */
    public function __construct($url, \Marek\Toggable\API\Security\TokenInterface $token)
    {
        $this->url = $url;
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function send(\Marek\Toggable\API\Http\Request\RequestInterface $request)
    {
        $opts = array(
            'http' => array(
                'method' => $request->getMethod(),
                'header' => array(
                    'Content-type: application/json',
                ),
            ),
        );

        if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION[SessionCookieInterface::COOKIE_NAME])) {

            $opts['http']['header'][] = 'Cookie ' . $_SESSION[SessionCookieInterface::COOKIE_NAME];

        } else {

            $auth = $this->token->getAuthentication();
            $auth = $auth[0] . ':' . $auth[1];
            $auth = base64_encode($auth);
            $opts['http']['header'][] = 'Authorization: Basic ' . $auth;

        }

        if (!empty($request->getData())) {
            $opts['http']['content'] = json_encode($request);
        }

        $context = stream_context_create($opts);

        $url = $this->url . '/' . $request->getUri();
        $stream = @fopen($url, 'r', false, $context);

        if ($stream == false) {
            throw new NetworkException("Error while trying to connect to Toggl");
        }

        $data = stream_get_contents($stream);
        if ($data === false) {
            throw new ServerException("Error reading response data.");
        }

        $metadata = stream_get_meta_data($stream);
        fclose($stream);

        return new HttpClientResponse($data, $metadata);
    }

    /**
     * @inheritDoc
     */
    public function setToken(\Marek\Toggable\API\Security\TokenInterface $token)
    {
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function setCookie(\Marek\Toggable\API\Security\Cookie\SessionCookieInterface $cookie)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION[SessionCookieInterface::COOKIE_NAME] = $cookie->toString();
    }
}
