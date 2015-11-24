<?php

namespace Marek\Toggl\Http;

use Marek\Toggl\Http\Value\Transport;

interface HttpClientInterface
{
    const GET = 'GET';

    const PUT = 'PUT';

    const POST = 'POST';

    const DELETE = 'DELETE';

    public function get(Transport $transport);

    public function post(Transport $transport);

    public function put(Transport $transport);

    public function delete(Transport $transport);
}
