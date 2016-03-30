<?php

namespace Marek\Toggable\API\Http\Request\Client;

use Marek\Toggable\API\Http\Request\Request;

/**
 * Class GetClientDetailsRequest
 * @package Marek\Toggable\API\Http\Request\Client
 *
 * @property-read int $clientId
 */
class GetClientDetailsRequest extends Request
{
    /**
     * @var string
     */
    public $uri = 'clients/{client_id}';

    /**
     * @var int
     */
    public $clientId;

    /**
     * @var string
     */
    public $method = Request::GET;

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
