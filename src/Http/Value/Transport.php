<?php

namespace Marek\Toggl\Http\Value;

use Marek\Toggl\Http\Value\Request\Value;

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
     * @return Value
     */
    abstract public function getData();
}
