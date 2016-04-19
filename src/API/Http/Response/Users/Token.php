<?php

namespace Marek\Toggable\API\Http\Response\Users;

use Marek\Toggable\API\Http\Response\Response;

/**
 * Class Token
 * @package Marek\Toggable\API\Http\Response\Users
 *
 * @property-read string $token
 */
class Token extends Response
{
    /**
     * @var string
     */
    public $token;
}
