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
use Marek\Toggable\API\Toggl\ClientServiceInterface;
use Marek\Toggable\Http\RequestManagerInterface;
use Zend\Hydrator\ObjectProperty;

/**
 * Class ClientService
 * @package Marek\Toggable\Service\Client
 */
class ClientService implements ClientServiceInterface
{

    /**
     * @var \Marek\Toggable\Http\RequestManagerInterface
     */
    private $requestManager;

    /**
     * ClientService constructor.
     *
     * @param \Marek\Toggable\Http\RequestManagerInterface $requestManager
     */
    public function __construct(RequestManagerInterface $requestManager)
    {
        $this->requestManager = $requestManager;
    }

    /**
     * {@inheritdoc}
     */
    public function createClient(ClientValue $client)
    {
        $request = new CreateClientRequest(array('client' => $client));
        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $clientResponse = (new ObjectProperty())->hydrate($response->body['data'], new ClientValue());

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

        $request = new GetClientDetailsRequest(array('clientId' => $clientId));
        $response = $this->requestManager->request($request);

        $client = (new ObjectProperty())->hydrate($response->body, new ClientValue);

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
            $clients[] = (new ObjectProperty())->hydrate($client, new ClientValue);
        }

        return new ClientsResponse(array('clients' => $clients));
    }

    /**
     * {@inheritdoc}
     */
    public function getClientProjects($clientId, $active = Client::ACTIVE)
    {
        $request = new GetClientProjectsRequest(array(
            'clientId' => $clientId,
            'active' => $active,
            )
        );

        $response = $this->requestManager->request($request);

        $projects = array();
        foreach ($response as $project) {
            $projects[] = (new ObjectProperty())->hydrate($project, new ProjectValue());
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

        $request = new UpdateClient(array(
            'clientId' => $clientId,
            'client' => $client,
            )
        );

        $response = $this->requestManager->request($request);

        if ($response instanceof Error) {
            return $response;
        }

        $client = (new ObjectProperty())->hydrate($response->body['data'], new ClientValue);

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
