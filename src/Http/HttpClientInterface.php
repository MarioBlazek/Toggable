<?php

namespace Marek\Toggl\Http;

interface HttpClientInterface
{
    const GET = 'GET';

    const PUT = 'PUT';

    const POST = 'POST';

    const DELETE = 'DELETE';

    public function get();

    public function post();

    public function put();

    public function delete();
}
