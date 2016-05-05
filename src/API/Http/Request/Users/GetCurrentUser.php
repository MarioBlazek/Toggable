<?php

namespace Marek\Toggable\API\Http\Request\Users;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetCurrentUser
 * @package Marek\Toggable\API\Http\Request\Users
 *
 * @property-read boolean $relatedData
 */
class GetCurrentUser extends Request
{
    /**
     * @var string
     */
    public $uri = 'me';

    /**
     * @var boolean
     */
    public $relatedData = false;

    /**
     * GetCurrentUser constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        if ($this->relatedData === true) {
            $this->uri = $this->uri . '?with_related_data=true';
        }
    }
}
