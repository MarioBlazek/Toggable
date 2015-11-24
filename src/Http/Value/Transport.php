<?php

namespace Marek\Toggl\Http\Value;

use Marek\Toggl\API\Request\Data;

/**
 * Class Transport
 * @package Marek\Toggl\Http\Value
 */
abstract class Transport
{
    /**
     * @return string
     */
    abstract public function getUri();

    /**
     * @return Data
     */
    abstract public function getData();
}
