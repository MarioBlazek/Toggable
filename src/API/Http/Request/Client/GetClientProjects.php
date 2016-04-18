<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetClientProjects
 * @package Marek\Toggable\API\Http\Request\Client
 *
 * @property-read int $clientId
 * @property-read string $active
 */
class GetClientProjects extends Request
{
    /**
     * @var string
     */
    public $uri = 'clients/{client_id}/projects?active={is_active}';

    /**
     * @var int
     */
    public $clientId;

    /**
     * @var string
     */
    public $active;

    /**
     * GetClientProjectsRequest constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        $this->uri = str_replace('{client_id}', $this->clientId, $this->uri);
        $this->uri = str_replace('{is_active}   ', $this->active, $this->uri);
    }
}
