<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetClientDetails
 * @package Marek\Toggable\API\Http\Request\Client
 *
 * @property-read int $clientId
 */
class GetClientDetails extends Request
{
    /**
     * @var string
     */
    protected $uri = 'clients/{client_id}';

    /**
     * @var int
     */
    protected $clientId;

    /**
     * GetClientDetailsRequest constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
        $this->uri = str_replace('{client_id}', $this->clientId, $this->uri);
    }
}
