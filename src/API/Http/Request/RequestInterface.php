<?php

namespace Marek\Toggable\API\Http\Request;

/**
 * Interface RequestInterface
 * @package Marek\Toggable\API\Http\Request
 */
interface RequestInterface extends \JsonSerializable
{
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
