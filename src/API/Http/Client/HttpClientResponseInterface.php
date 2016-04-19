<?php

namespace Marek\Toggable\API\Http\Client;

/**
 * Interface HttpClientResponseInterface
 * @package Marek\Toggable\API\Http\Client
 */
interface HttpClientResponseInterface
{
    /**
     * Returns response data
     *
     * @return string
     */
    public function getData();

    /**
     * Returns response metadata
     *
     * @return array
     */
    public function getMetadata();
}
