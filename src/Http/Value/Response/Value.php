<?php

namespace Marek\Toggl\Http\Value\Response;

abstract class Value
{
    public $statusCode;

    public $data;

    public function __construct($statusCode, $data)
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
    }
}
