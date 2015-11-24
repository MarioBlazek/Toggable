<?php

namespace Marek\Toggl\API\Request;

use Marek\Toggl\API\Value\ValueObject;

abstract class Data extends ValueObject
{
    abstract public function getData();
}
