<?php

namespace Marek\Toggable\Http\Client;

use Marek\Toggable\API\Http\Client\HttpClientResponseInterface;

/**
 * Class HttpClientResponse
 * @package Marek\Toggable\Http\Client
 */
class HttpClientResponse implements HttpClientResponseInterface
{
    /**
     * @var string
     */
    private $data;

    /**
     * @var array
     */
    private $metadata;

    /**
     * HttpClientResponse constructor.
     *
     * @param string $data
     * @param array $metadata
     */
    public function __construct($data, $metadata)
    {
        $this->data = $data;
        $this->metadata = $metadata;
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
}
