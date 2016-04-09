<?php

namespace Marek\Toggable\API\Toggl\Values;

/**
 * Class Emails
 * @package Marek\Toggable\API\Toggl\Values
 *
 * @property-read array $emails
 */
class Emails extends ValueObject
{
    /**
     * @var array
     */
    public $emails;

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->emails;
    }
}
