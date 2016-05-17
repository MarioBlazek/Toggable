<?php

namespace Marek\Toggable\Http\Client;

/**
 * Interface HttpClientInterface
 * @package Marek\Toggable\Http\Client
 */
interface HttpClientInterface
{
    /**
     * Sends http request and returns response data
     *
     * @throws \Marek\Toggable\API\Exception\Http\BaseException
     */
    public function send();

    /**
     * Prepares request parameters from Request object
     *
     * @param \Marek\Toggable\API\Http\Request\RequestInterface $request
     */
    public function prepare(\Marek\Toggable\API\Http\Request\RequestInterface $request);

    /**
     * Returns Response object or throws exception
     *
     * @return \Marek\Toggable\API\Http\Response\ResponseInterface
     */
    public function getResponse();
}
