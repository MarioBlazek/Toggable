<?php

namespace Marek\Toggable\API\Toggl\Values;

/**
 * Class Notification
 * @package Marek\Toggable\API\Toggl\Values
 *
 * @property-read string $message
 */
class Notification extends ValueObject
{
    /**
     * @var string
     */
    protected $message;
}
