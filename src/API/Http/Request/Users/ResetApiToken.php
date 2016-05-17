<?php

namespace Marek\Toggable\API\Http\Request\Users;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class ResetApiToken
 * @package Marek\Toggable\API\Http\Request\Users
 */
class ResetApiToken extends Request
{
    /**
     * @var string
     */
    protected $uri = 'reset_token';

    /**
     * @var string
     */
    protected $method = Request::POST;
}
