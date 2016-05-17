<?php

namespace Marek\Toggable\API\Http\Request\Authentication;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class DestroySession
 * @package Marek\Toggable\API\Http\Request\Authentication
 */
class DestroySession extends SessionCookie
{
    /**
     * @var string
     */
    protected $method = Request::DELETE;
}
