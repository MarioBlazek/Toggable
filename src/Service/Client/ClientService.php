<?php

namespace Marek\Toggable\Service\Client;

use Marek\Toggable\API\Toggl\Client;
use Marek\Toggable\API\Toggl\ClientServiceInterface;

class ClientService implements ClientServiceInterface
{

    public function createClient() {
        // TODO: Implement createClient() method.
    }

    /**
     * Gets detailed data about client
     *
     * @param int $clientId
     *
     * @return \Marek\Toggable\API\Http\Client\ClientResponse
     */
    public function getClientDetails($clientId) {
        // TODO: Implement getClientDetails() method.
    }

    /**
     * Get list of clients available to the user
     *
     * @return \Marek\Toggable\API\Http\Client\ClientsResponse
     */
    public function getClients() {
        // TODO: Implement getClients() method.
    }

    /**
     * Get list of client projects
     *
     * @param int $clientId
     * @param string $active
     *
     * @return \Marek\Toggable\API\Http\Project\ProjectsResponse
     */
    public function getClientProjects($clientId, $active = Client::ACTIVE) {
        // TODO: Implement getClientProjects() method.
    }

    public function updateClient() {
        // TODO: Implement updateClient() method.
    }

    public function deleteClient($clientId) {
        // TODO: Implement deleteClient() method.
    }
}
