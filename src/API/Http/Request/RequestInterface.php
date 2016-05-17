<?php

namespace Marek\Toggable\API\Http\Request;

/**
 * Interface RequestInterface
 * @package Marek\Toggable\API\Http\Request
 */
interface RequestInterface extends \JsonSerializable
{
    /**
     * HTTP GET method
     */
    const GET = 'GET';

    /**
     * HTTP POST method
     */
    const POST = 'POST';

    /**
     * HTTP PUT method
     */
    const PUT = 'PUT';

    /**
     * HTTP DELETE method
     */
    const DELETE = 'DELETE';
    
    /**
     * Returns HTTP method
     *
     * @return string
     */
    public function getMethod();

    /**
     * Returns URI
     *
     * @return string
     */
    public function getUri();

    /**
     * Returns POST data
     *
     * @return array
     */
    public function getData();
}
