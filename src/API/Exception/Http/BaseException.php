<?php

namespace Marek\Toggable\API\Exception\Http;

/**
 * Class BaseException
 * @package Marek\Toggable\API\Exception\Http
 */
class BaseException extends \Exception
{
    /**
     * BaseException constructor.
     * 
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message, null, null);
    }
}
