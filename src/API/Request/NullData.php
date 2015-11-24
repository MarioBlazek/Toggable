<?php

namespace Marek\Toggl\API\Request;

class NullData extends Data
{
    public function getData()
    {
        return null;
    }
}
