<?php

namespace Marek\Toggl\Http\Value;

use Marek\Toggl\Http\Value\Request\Value;

class TransportValue extends Transport
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var Value
     */
    private $data;

    public function __construct($uri, Value $data)
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
     * @return Value
     */
    public function getData()
    {
        return $this->data;
    }
}
