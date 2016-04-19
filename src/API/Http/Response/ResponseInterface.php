<?php

namespace Marek\Toggable\API\Http\Response;

/**
 * Interface ResponseInterface
 * @package Marek\Toggable\API\Http\Response
 */
interface ResponseInterface
{
    /**
     * Returns response body
     *
     * @return array
     */
    public function getBody();

    /**
     * Returns status code
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Returns cookie
     * 
     * @return string
     */
    public function getCookie();
}
