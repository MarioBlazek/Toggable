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
    public $uri = 'reset_token';

    /**
     * @var string
     */
    public $method = Request::POST;
}
