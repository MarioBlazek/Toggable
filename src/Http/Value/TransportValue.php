<?php

namespace Marek\Toggl\Http\Value;

use Marek\Toggl\API\Request\Data;

class TransportValue extends Transport
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var Data
     */
    private $data;

    public function __construct($uri, Data $data)
    {
        $this->uri = $uri;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return Data
     */
    public function getData()
    {
        return $this->data;
    }
}
