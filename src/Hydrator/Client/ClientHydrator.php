<?php

namespace Marek\Toggable\Hydrator\Client;

use Marek\Toggable\API\Toggl\Values\Client\Client;
use Marek\Toggable\Hydrator\BaseHydrator;

/**
 * Class ClientHydrator
 * @package Marek\Toggable\Hydrator\Client
 */
class ClientHydrator extends BaseHydrator
{
    /**
     * {@inheritdoc}
     */
    public function canHydrate($object)
    {
        if ($object instanceof Client) {
            return true;
        }

        return false;
    }
}
