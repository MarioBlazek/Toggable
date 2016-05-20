<?php

namespace Marek\Toggable\Service\Client;

use Marek\Toggable\API\Http\Request\Client\UpdateClient;
use Marek\Toggable\API\Http\Response\Client\Client as ClientResponse;
use Marek\Toggable\API\Http\Response\Client\Clients as ClientsResponse;
use Marek\Toggable\API\Http\Response\Project\Projects as ProjectsResponse;
use Marek\Toggable\API\Toggl\Values\Project\Project as ProjectValue;
use Marek\Toggable\API\Toggl\Values\Client\Client as ClientValue;
use Marek\Toggable\API\Http\Request\Client\CreateClient as CreateClientRequest;
use Marek\Toggable\API\Http\Request\Client\GetClientDetails as GetClientDetailsRequest;
use Marek\Toggable\API\Http\Request\Client\GetClientProjects as GetClientProjectsRequest;
use Marek\Toggable\API\Http\Request\Client\GetClients as GetClientsRequest;
use Marek\Toggable\API\Http\Request\Client\DeleteClient as DeleteClientRequest;
use Marek\Toggable\Service\AbstractService;
use Marek\Toggable\API\Toggl\Values\Activity;

/**
 * Class ClientService
 * @package Marek\Toggable\Service\Client
 */
class ClientService extends AbstractService implements \Marek\Toggable\API\Toggl\ClientServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function createClient(ClientValue $client)
    {
        $request = new CreateClientRequest(
            array(
                'data' => $this->extractDataFromObject($client),
            )
        );

        $response = $this->delegate($request);

        return new ClientResponse(
            array(
                'client' => $this->hydrateDataFromArrayToObject($response, new ClientValue()),
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getClientDetails($clientId)
    {
        $request = new GetClientDetailsRequest(
            array(
                'clientId' => $this->validate($clientId),
            )
        );

        $response = $this->delegate($request);

        return new ClientResponse(
            array(
                'client' => $this->hydrateDataFromArrayToObject($response, new ClientValue())
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getClients()
    {
        $request = new GetClientsRequest();

        $response = $this->delegate($request);

        $clients = array();
        foreach($response->body as $client) {
            $clients[] = $this->hydrator->hydrate($client, new ClientValue);
        }

        return new ClientsResponse(
            array(
                'clients' => $clients,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getClientProjects($clientId, $active = Activity::ACTIVE)
    {
        $request = new GetClientProjectsRequest(
            array(
                'clientId' => $this->validate($clientId),
                'active' => $active,
            )
        );

        $response = $this->delegate($request);

        $projects = array();
        foreach ($response->body as $project) {
            $projects[] = $this->hydrator->hydrate($project, new ProjectValue());
        }

        return new ProjectsResponse(array('projects' => $projects));
    }

    /**
     * {@inheritdoc}
     */
    public function updateClient($clientId, ClientValue $client)
    {
        $request = new UpdateClient(
            array(
                'clientId' => $this->validate($clientId),
                'data' => $this->extractDataFromObject($client),
            )
        );

        $response = $this->delegate($request);

        return new ClientResponse(
            array(
                'client' => $this->hydrateDataFromArrayToObject($response, new ClientValue()),
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function deleteClient($clientId)
    {
        $request = new DeleteClientRequest(
            array(
                'clientId' => $this->validate($clientId),
            )
        );

        return $this->delegate($request);
    }
}
