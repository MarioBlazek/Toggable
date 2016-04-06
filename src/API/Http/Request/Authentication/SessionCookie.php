<?php

namespace Marek\Toggable\API\Http\Request\Authentication;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class SessionCookie
 * @package Marek\Toggable\API\Http\Request\Authentication
 */
class SessionCookie extends Request
{
    /**
     * @var string
     */
    public $uri = 'sessions';

    /**
     * @var string
     */
    public $method = Request::POST;
}
