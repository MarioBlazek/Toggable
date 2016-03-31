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
     * @return \Marek\Toggable\API\Http\Response\Client\Client
     */
    public function createClient(\Marek\Toggable\API\Toggl\Values\Client\Client $client);

    /**
     * Gets detailed data about client
     *
     * @param int $clientId
     *
     * @return \Marek\Toggable\API\Http\Response\Client\Client
     */
    public function getClientDetails($clientId);

    /**
     * Get list of clients available to the user
     *
     * @return \Marek\Toggable\API\Http\Response\Client\Clients
     */
    public function getClients();

    /**
     * Get list of client projects
     *
     * @param int $clientId
     * @param string $active
     *
     * @return \Marek\Toggable\API\Http\Response\Project\Projects
     */
    public function getClientProjects($clientId, $active = \Marek\Toggable\API\Toggl\Values\Client\Client::ACTIVE);

    /**
     * Updates Client
     *
     * @param int $clientId
     * @param \Marek\Toggable\API\Toggl\Values\Client\Client $client
     *
     * @return \Marek\Toggable\API\Http\Response\Client\Client
     */
    public function updateClient($clientId, \Marek\Toggable\API\Toggl\Values\Client\Client $client);

    /**
     * Deletes Client by client id
     *
     * @param int $clientId
     *
     * @return \Marek\Toggable\API\Http\Response\Successful
     */
    public function deleteClient($clientId);
}
