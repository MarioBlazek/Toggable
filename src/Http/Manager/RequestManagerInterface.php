<?php

namespace Marek\Toggable\Http\Manager;

/**
 * Interface RequestManagerInterface
 * @package Marek\Toggable\Http\Manager
 */
interface RequestManagerInterface
{
    /**
     * Gets Request and returns Response
     *
     * @param \Marek\Toggable\API\Http\Request\Request $request
     *
     * @return \Marek\Toggable\API\Http\Response\Response
     */
    public function request(\Marek\Toggable\API\Http\Request\Request $request);

    /**
     * Returns HttpClient instance
     * 
     * @return \Marek\Toggable\Http\Client\HttpClientInterface
     */
    public function getHttpClient();
}
