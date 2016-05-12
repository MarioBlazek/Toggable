<?php

namespace Marek\Toggable\API\Exception;

use Exception;

/**
 * Class NotFoundException
 * @package Marek\Toggable\API\Exception
 */
class NotFoundException extends Exception
{
    /**
     * NotFoundException constructor.
     *
     * @param string $what
     */
    public function __construct($what)
    {
        $message = sprintf("No %s results returned from Toggl", $what);
        parent::__construct($message);
    }
}
