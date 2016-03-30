<?php

namespace Marek\Toggable\Service\Client;

use InvalidArgumentException;
use Marek\Toggable\API\Http\Client\ClientResponse;
use Marek\Toggable\API\Http\Client\ClientsResponse;
use Marek\Toggable\API\Http\Project\ProjectsResponse;
use Marek\Toggable\API\Http\Request\Client\GetClientDetailsRequest;
use Marek\Toggable\API\Http\Request\Client\GetClientProjectsRequest;
use Marek\Toggable\API\Http\Request\Client\GetClientsRequest;
use Marek\Toggable\API\Toggl\Project\Project;
use Marek\Toggable\API\Toggl\Values\Client\Client;
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
    public function createClient()
    {
        // TODO: Implement createClient() method.
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

        $client = (new ObjectProperty())->hydrate($response->body, new Client);

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
            $clients[] = (new ObjectProperty())->hydrate($client, new Client);
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
            $projects[] = (new ObjectProperty())->hydrate($project, new Project());
        }

        return new ProjectsResponse(array('projects' => $projects));

    }

    /**
     * {@inheritdoc}
     */
    public function updateClient()
    {
        // TODO: Implement updateClient() method.
    }

    /**
     * {@inheritdoc}
     */
    public function deleteClient($clientId)
    {
        // TODO: Implement deleteClient() method.
    }
}
