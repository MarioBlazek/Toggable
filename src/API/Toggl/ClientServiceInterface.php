<?php

namespace Marek\Toggable\API\Toggl;

/**
 * Interface ClientInterface
 * @package Marek\Toggable\API\Toggl
 */
interface ClientServiceInterface
{
    /**
     * Creates new Client
     *
     * @param \Marek\Toggable\API\Toggl\Values\Client\Client $client
     *
     * @return \Marek\Toggable\API\Http\Client\ClientResponse
     */
    public function createClient(\Marek\Toggable\API\Toggl\Values\Client\Client $client);

    /**
     * Gets detailed data about client
     *
     * @param int $clientId
     *
     * @return \Marek\Toggable\API\Http\Client\ClientResponse
     */
    public function getClientDetails($clientId);

    /**
     * Get list of clients available to the user
     *
     * @return \Marek\Toggable\API\Http\Client\ClientsResponse
     */
    public function getClients();

    /**
     * Get list of client projects
     *
     * @param int $clientId
     * @param string $active
     *
     * @return \Marek\Toggable\API\Http\Project\ProjectsResponse
     */
    public function getClientProjects($clientId, $active = \Marek\Toggable\API\Toggl\Values\Client\Client::ACTIVE);

    public function updateClient();

    public function deleteClient($clientId);
}
