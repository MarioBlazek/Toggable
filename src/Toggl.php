<?php

namespace Marek\Toggable;

use Marek\Toggable\API\Toggl\ClientServiceInterface;

/**
 * Class Toggl
 * @package Marek\Toggable
 */
class Toggl implements TogglInterface
{
    /**
     * @var \Marek\Toggable\API\Toggl\ClientServiceInterface
     */
    private $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * {@inheritdoc}
     */
    public function getClientService()
    {
        return $this->clientService;
    }
}
