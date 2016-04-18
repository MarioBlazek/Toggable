<?php

namespace Marek\Toggable\Service\Client;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Request\Client\UpdateClient;
use Marek\Toggable\API\Http\Response\Client\Client as ClientResponse;
use Marek\Toggable\API\Http\Response\Client\Clients as ClientsResponse;
use Marek\Toggable\API\Http\Response\Project\Projects as ProjectsResponse;
use Marek\Toggable\API\Http\Response\Successful as SuccessfulResponse;
use Marek\Toggable\API\Toggl\Values\Project\Project as ProjectValue;
use Marek\Toggable\API\Toggl\Values\Client\Client as ClientValue;
use Marek\Toggable\API\Http\Request\Client\CreateClient as CreateClientRequest;
use Marek\Toggable\API\Http\Request\Client\GetClientDetails as GetClientDetailsRequest;
use Marek\Toggable\API\Http\Request\Client\GetClientProjects as GetClientProjectsRequest;
use Marek\Toggable\API\Http\Request\Client\GetClients as GetClientsRequest;
use Marek\Toggable\API\Http\Request\Client\DeleteClient as DeleteClientRequest;
use Marek\Toggable\API\Http\Response\Error;
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

        $client = $this->hydrator->extract($client);

        $request = new CreateClientRequest(
            array(
                'data' => $client,
            )
        );

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $clientResponse = $this->hydrator->hydrate($response->body['data'], new ClientValue());

        return new ClientResponse(array('client' => $clientResponse));
    }

    /**
     * {@inheritdoc}
     */
    public function getClientDetails($clientId)
    {
        if (empty($clientId) || !is_int($clientId)) {
            throw new InvalidArgumentException(
                sprintf('$clientId argument not provided in %s', get_class($this))
            );
        }

        $request = new GetClientDetailsRequest(
            array(
                'clientId' => $clientId,
            )
        );

        $response = $this->requestManager->request($request);

        $client = $this->hydrator->hydrate($response->body['data'], new ClientValue);

        return new ClientResponse(array('client' => $client));
    }

    /**
     * {@inheritdoc}
     */
    public function getClients()
    {
        $request = new GetClientsRequest();
        $response = $this->requestManager->request($request);

        $clients = array();
        foreach($response->body as $client) {
            $clients[] = $this->hydrator->hydrate($client, new ClientValue);
        }

        return new ClientsResponse(array('clients' => $clients));
    }

    /**
     * {@inheritdoc}
     */
    public function getClientProjects($clientId, $active = Activity::ACTIVE)
    {
        $request = new GetClientProjectsRequest(array(
            'clientId' => $clientId,
            'active' => $active,
            )
        );

        $response = $this->requestManager->request($request);

        $projects = array();
        foreach ($response as $project) {
            $projects[] = $this->hydrator->hydrate($project, new ProjectValue());
        }

        return new ProjectsResponse(array('projects' => $projects));

    }

    /**
     * {@inheritdoc}
     */
    public function updateClient($clientId, ClientValue $client)
    {
        if (empty($clientId) || !is_int($clientId)) {
            throw new InvalidArgumentException(
                sprintf('$clientId argument not provided in %s', get_class($this))
            );
        }

        $client = $this->hydrator->extract($client);

        $request = new UpdateClient(array(
            'clientId' => $clientId,
            'data' => $client,
            )
        );

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $client = $this->hydrator->hydrate($response->body['data'], new ClientValue);

        return new ClientResponse(array('client' => $client));
    }

    /**
     * {@inheritdoc}
     */
    public function deleteClient($clientId)
    {
        if (empty($clientId) || !is_int($clientId)) {
            throw new InvalidArgumentException(
                sprintf('$clientId argument not provided in %s', get_class($this))
            );
        }

        $request = new DeleteClientRequest(array('clientId' => $clientId));
        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        return new SuccessfulResponse();
    }
}
