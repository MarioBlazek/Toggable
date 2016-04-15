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
    public function extract($object)
    {
        if (!$object instanceof Client) {
            return $object;
        }

        return $this->hydrator->extract($object);
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof Client) {
            return $object;
        }

        return $this->hydrator->hydrate($data, $object);
    }
}
