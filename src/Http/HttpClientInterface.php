<?php

namespace Marek\Toggl\Http;

interface HttpClientInterface
{
    public function get();

    public function post();
}
